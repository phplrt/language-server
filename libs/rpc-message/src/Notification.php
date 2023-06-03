<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

class Notification implements NotificationInterface
{
    /**
     * @param non-empty-string $method
     * @param array<array-key, mixed> $parameters
     */
    public function __construct(
        protected readonly string $method,
        protected readonly array $parameters = [],
    ) {
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
