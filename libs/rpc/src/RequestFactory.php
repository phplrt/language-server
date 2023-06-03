<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC;

use Phplrt\LanguageServer\RPC\Exception\IdExceptionInterface;
use Phplrt\LanguageServer\RPC\Message\IdFactory\GeneratorInterface;
use Phplrt\LanguageServer\RPC\Message\IdFactory\Int32Generator;
use Phplrt\LanguageServer\RPC\Message\IdFactory\Int64Generator;
use Phplrt\LanguageServer\RPC\Message\IdInterface;
use Phplrt\LanguageServer\RPC\Message\Notification;
use Phplrt\LanguageServer\RPC\Message\NotificationInterface;
use Phplrt\LanguageServer\RPC\Message\Request;
use Phplrt\LanguageServer\RPC\Message\RequestInterface;

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
        return new Request($id ?? $this->id->generate(), $method, $parameters);
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
