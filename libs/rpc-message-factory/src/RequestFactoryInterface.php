<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message\Factory;

use Phplrt\RPC\Message\IdInterface;
use Phplrt\RPC\Message\NotificationInterface;
use Phplrt\RPC\Message\RequestInterface;

interface RequestFactoryInterface
{
    /**
     * @param non-empty-string $method
     * @param array<array-key, mixed> $parameters
     * @param IdInterface|null $id
     */
    public function createRequest(string $method, array $parameters = [], IdInterface $id = null): RequestInterface;

    /**
     * @param non-empty-string $method
     * @param array<array-key, mixed> $parameters
     */
    public function createNotification(string $method, array $parameters = []): NotificationInterface;
}
