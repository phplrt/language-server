<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Transport\Socket;

use Evenement\EventEmitter;
use Phplrt\LanguageServer\Connection\ConnectionInterface;
use Phplrt\RPC\Protocol\DecoderInterface;
use Phplrt\RPC\Protocol\EncoderInterface;
use Phplrt\RPC\Protocol\JsonRPCv2;
use Phplrt\Contracts\RPC\Message\FailureResponseInterface;
use Phplrt\Contracts\RPC\Message\NotificationInterface;
use Phplrt\Contracts\RPC\Message\RequestInterface;
use Phplrt\Contracts\RPC\Message\SuccessfulResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use React\Socket\ConnectionInterface as SocketConnectionInterface;

/**
 * @internal This is an internal class, please do not use it in your application code.
 * @psalm-internal Phplrt\LanguageServer\Transport
 */
final class Connection extends EventEmitter implements ConnectionInterface
{
    public const EVENT_REQUEST = 'request';
    public const EVENT_NOTIFICATION = 'notification';

    private readonly MessageEmitter $messages;

    public function __construct(
        private readonly SocketConnectionInterface $socket,
        DecoderInterface $decoder = new JsonRPCv2(),
        private readonly EncoderInterface $encoder = new JsonRPCv2(),
        private readonly LoggerInterface $logger = new NullLogger(),
    ) {
        $this->messages = new MessageEmitter($decoder);
        $this->messages->on(MessageEmitter::EVENT_MESSAGE, $this->onMessageReceive(...));

        $this->socket->on('data', $this->onRawDataReceive(...));
        $this->socket->on('close', $this->onConnectionClose(...));
    }

    private function onConnectionClose(): void
    {
        $this->messages->removeAllListeners();
        $this->removeAllListeners();
    }

    private function onRawDataReceive(string $chunk): void
    {
        $this->logger->debug('Data received from ' . $this->socket->getRemoteAddress(), [
            $chunk
        ]);

        $this->messages->push($chunk);
    }

    private function onMessageReceive(Message $message): void
    {
        // Skip non-requests
        if (!$message->body instanceof NotificationInterface) {
            return;
        }

        if ($message->body instanceof RequestInterface) {
            $this->emit(self::EVENT_REQUEST, [
                $message->body,
                $message->headers,
            ]);

            return;
        }

        $this->emit(self::EVENT_NOTIFICATION, [
            $message->body,
            $message->headers,
        ]);
    }

    private function write(string $data, array $headers): void
    {
        $message = '';

        foreach ($headers as $name => $value) {
            $message .= "$name: $value\r\n";
        }

        $message .= "\r\n$data";

        $this->socket->write($message);
        $this->logger->debug('Data sent to ' . $this->socket->getRemoteAddress(), [$message]);
    }

    public function success(SuccessfulResponseInterface $response): void
    {
        $message = $this->encoder->encode($response);

        $this->write($message, ['Content-Length' => \strlen($message)]);
    }

    public function error(FailureResponseInterface $response): void
    {
        $message = $this->encoder->encode($response);

        $this->write($message, ['Content-Length' => \strlen($message)]);
    }

    public function onRequest(callable $callback): void
    {
        $this->on(self::EVENT_REQUEST, $callback(...));
    }

    public function onNotification(callable $callback): void
    {
        $this->on(self::EVENT_NOTIFICATION, $callback(...));
    }
}
