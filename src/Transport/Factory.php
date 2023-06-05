<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Transport;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

final class Factory implements FactoryInterface
{
    public function __construct(
        private readonly LoggerInterface $logger = new NullLogger(),
    ) {}

    public function create(string $dsn): TransportInterface
    {
        $components = \parse_url($dsn);

        if (!isset($components['scheme'])) {
            $components['scheme'] = 'tcp';
        }

        return match (\strtolower($components['scheme'])) {
            'tcp' => new SocketTransport(
                $components['host'] ?? SocketTransport::DEFAULT_HOST,
                $components['port'] ?? SocketTransport::DEFAULT_PORT,
                $this->logger,
            ),
            default => throw new \InvalidArgumentException(
                \sprintf('Unsupported LSP DSN format "%s"', $dsn)
            ),
        };
    }
}
