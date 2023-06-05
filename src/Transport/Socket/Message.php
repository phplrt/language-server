<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Transport\Socket;

use Phplrt\RPC\Message\MessageInterface;

/**
 * @internal This is an internal class, please do not use it in your application code.
 * @psalm-internal Phplrt\LanguageServer\Transport\Socket
 */
final class Message
{
    /**
     * @param array<non-empty-lowercase-string, string> $headers
     */
    public function __construct(
        public readonly array $headers,
        public readonly MessageInterface $body,
    ) {}
}
