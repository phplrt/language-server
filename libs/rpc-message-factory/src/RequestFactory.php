<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message\Factory;

use Phplrt\RPC\Message\Factory\Exception\IdExceptionInterface;
use Phplrt\RPC\Message\Factory\IdFactory\GeneratorInterface;
use Phplrt\RPC\Message\Factory\IdFactory\Int32Generator;
use Phplrt\RPC\Message\Factory\IdFactory\Int64Generator;
use Phplrt\RPC\Message\IdInterface;
use Phplrt\RPC\Message\Notification;
use Phplrt\RPC\Message\NotificationInterface;
use Phplrt\RPC\Message\Request;
use Phplrt\RPC\Message\RequestInterface;

final class RequestFactory implements RequestFactoryInterface
{
    private readonly GeneratorInterface $id;

    public function __construct(
        GeneratorInterface $id = null,
    ) {
        $this->id = $this->bootIdGenerator($id);
    }

    private function bootIdGenerator(?GeneratorInterface $id): GeneratorInterface
    {
        if ($id instanceof GeneratorInterface) {
            return $id;
        }

        if (\PHP_INT_SIZE === 8) {
            return new Int64Generator();
        }

        return new Int32Generator();
    }

    /**
     * @param non-empty-string $method
     * @param array<array-key, mixed> $parameters
     *
     * @throws IdExceptionInterface
     */
    public function createRequest(string $method, array $parameters = [], IdInterface $id = null): RequestInterface
    {
        return new Request($id ?? $this->id->nextId(), $method, $parameters);
    }

    /**
     * @param non-empty-string $method
     * @param array<array-key, mixed> $parameters
     */
    public function createNotification(string $method, array $parameters = []): NotificationInterface
    {
        return new Notification($method, $parameters);
    }
}
