<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\SocketServer\Connection;

use Phplrt\RPC\Message\MessageInterface;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\SocketServer
 */
final class Message
{
    /**
     * @param array<non-empty-lowercase-string, string> $headers
     */
    public function __construct(
        public readonly array $headers,
        public readonly MessageInterface $body,
    ) {
    }
}
