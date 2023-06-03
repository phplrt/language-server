<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC;

use Phplrt\LanguageServer\RPC\Message\IdInterface;
use Phplrt\LanguageServer\RPC\Message\NotificationInterface;
use Phplrt\LanguageServer\RPC\Message\RequestInterface;

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
