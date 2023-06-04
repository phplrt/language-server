<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Transport;

use Evenement\EventEmitter;
use Phplrt\LanguageServer\Transport\Socket\Connection;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use React\Socket\ConnectionInterface;
use React\Socket\SocketServer as ReactSocketServer;

final class SocketTransport extends EventEmitter implements TransportInterface
{
    public const DEFAULT_HOST = '0.0.0.0';
    public const DEFAULT_PORT = 5007;

    public const EVENT_IDE_CONNECT = 'connect';
    public const EVENT_IDE_DISCONNECT = 'disconnect';

    /**
     * @var \WeakMap<ConnectionInterface, Connection>
     */
    private readonly \WeakMap $connections;

    /**
     * @param non-empty-string $host
     * @param int<0, 65535> $port
     * @param LoggerInterface $logger
     */
    public function __construct(
        string $host = self::DEFAULT_HOST,
        int $port = self::DEFAULT_PORT,
        private readonly LoggerInterface $logger = new NullLogger(),
    ) {
        $this->connections = new \WeakMap();

        $this->listen(\sprintf('tcp://%s:%d', $host, $port));
    }

    /**
     * @param non-empty-string $address
     */
    private function listen(string $address): void
    {
        $socket = new ReactSocketServer($address);

        $this->logger->debug('Start listening server on ' . $address);

        $socket->on('connection', $this->onSocketConnect(...));
    }

    private function onSocketConnect(ConnectionInterface $socket): void
    {
        $this->logger->debug('Establishing IDE Connection on ' . $socket->getRemoteAddress());

        $this->connections[$socket] = $connection = new Connection(
            socket: $socket,
            logger: $this->logger,
        );

        $this->emit(self::EVENT_IDE_CONNECT, [$connection]);

        $socket->on('close', function () use ($socket) {
            $this->logger->debug('Closing IDE Connection on ' . $socket->getRemoteAddress());

            $connection = $this->connections[$socket];

            unset($this->connections[$socket]);

            $this->emit(self::EVENT_IDE_DISCONNECT, [$connection]);
        });
    }

    public function onConnect(callable $callback): void
    {
        $this->on(self::EVENT_IDE_CONNECT, $callback(...));
    }

    public function onDisconnect(callable $callback): void
    {
        $this->on(self::EVENT_IDE_DISCONNECT, $callback(...));
    }
}
