<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Phplrt\LanguageServer\Connection\ConnectionInterface;
use Phplrt\LanguageServer\SocketServer\SocketServer;
use Phplrt\LanguageServer\RPC\Hydrator\Hydrator;

final class LanguageServer
{
    private readonly Hydrator $hydrator;

    /**
     * @var \WeakMap<ConnectionInterface, Session>
     */
    private readonly \WeakMap $sessions;

    public function __construct(
        private readonly LoggerInterface $logger = new NullLogger(),
    ) {
        $this->sessions = new \WeakMap();

        $this->hydrator = new Hydrator([
            'Phplrt\LanguageServer\Protocol' => __DIR__ . '/../config',
        ]);
    }

    /**
     * @param non-empty-string $host
     * @param int<0, 65535> $port
     *
     * @return void
     */
    public function tcp(string $host = '0.0.0.0', int $port = 5007): void
    {
        $this->subscribe(new SocketServer($host, $port, $this->logger));
    }

    private function subscribe(ServerInterface $server): void
    {
        $server->onConnect(function (ConnectionInterface $ide): void {
            $this->sessions[$ide] = new Session($this->logger, $ide, $this->hydrator, $this->hydrator);
        });

        $server->onDisconnect(function (ConnectionInterface $ide): void {
            unset($this->sessions[$ide]);
        });
    }
}
