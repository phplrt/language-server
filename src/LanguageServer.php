<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer;

use Phplrt\LanguageServer\Connection\ConnectionInterface;
use Phplrt\LanguageServer\Transport\Factory;
use Phplrt\LanguageServer\Transport\FactoryInterface;
use Phplrt\RPC\Dispatcher\AttributeAwareDispatcher;
use Phplrt\RPC\Dispatcher\DispatcherInterface;
use Phplrt\RPC\Hydrator\Extractor;
use Phplrt\RPC\Hydrator\ExtractorInterface;
use Phplrt\RPC\Hydrator\Hydrator;
use Phplrt\RPC\Hydrator\HydratorInterface;
use Phplrt\RPC\Message\FailureResponseInterface;
use Phplrt\RPC\Message\IdFactory;
use Phplrt\RPC\Message\IdFactoryInterface;
use Phplrt\RPC\Message\NotificationInterface;
use Phplrt\RPC\Message\RequestInterface;
use Phplrt\RPC\Message\ResponseFactory;
use Phplrt\RPC\Message\ResponseFactoryInterface;
use Phplrt\RPC\Message\SuccessfulResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

final class LanguageServer
{
    /**
     * @var \WeakMap<ConnectionInterface, DispatcherInterface>
     */
    private readonly \WeakMap $sessions;

    private readonly FactoryInterface $transport;

    public function __construct(
        private readonly LoggerInterface $logger = new NullLogger(),
        private readonly HydratorInterface $hydrator = new Hydrator(),
        private readonly ExtractorInterface $extractor = new Extractor(),
        private readonly ResponseFactoryInterface $responses = new ResponseFactory(),
        private readonly IdFactoryInterface $ids = new IdFactory(),
    ) {
        $this->sessions = new \WeakMap();
        $this->transport = new Factory($this->logger);
    }

    public function listen(string $dsn, ConnectorInterface $connector): void
    {
        $transport = $this->transport->create($dsn);

        $transport->onConnect(function (ConnectionInterface $connection) use ($connector): void {
            $server = $connector->connect($connection);

            $this->sessions[$connection] = $this->createSession($connection, $server);
        });

        $transport->onDisconnect(function (ConnectionInterface $connection) use ($connector): void {
            unset($this->sessions[$connection]);
        });
    }

    private function createSession(ConnectionInterface $connection, ServerInterface $server): DispatcherInterface
    {
        $dispatcher = new AttributeAwareDispatcher(
            context: $server,
            hydrator: $this->hydrator,
            extractor: $this->extractor,
            responses: $this->responses,
            ids: $this->ids,
        );

        $connection->onRequest(function (RequestInterface $request) use ($connection, $dispatcher): void {
            $this->logger->info(' -> call [' . $request->getId() . '] ' . $request->getMethod());

            $response = $dispatcher->dispatchMethod($request);

            if ($response instanceof SuccessfulResponseInterface) {
                $connection->success($response);
                $this->logger->info(' <- result [' . $request->getId() . ']');
            }

            if ($response instanceof FailureResponseInterface) {
                $connection->error($response);
                $this->logger->info(' <- error [' . $request->getId() . '] ' . $response->getErrorMessage());
            }
        });

        $connection->onNotification(function (NotificationInterface $notice) use ($connection, $dispatcher): void {
            $this->logger->info(' -> notify ' . $notice->getMethod());

            $response = $dispatcher->dispatchProcedure($notice);

            if ($response instanceof FailureResponseInterface) {
                $connection->error($response);
            }
        });

        return $dispatcher;
    }
}
