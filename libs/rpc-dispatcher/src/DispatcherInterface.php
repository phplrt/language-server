<?php

declare(strict_types=1);

namespace Phplrt\RPC\Dispatcher;

use Phplrt\Contracts\RPC\Message\FailureResponseInterface;
use Phplrt\Contracts\RPC\Message\NotificationInterface;
use Phplrt\Contracts\RPC\Message\RequestInterface;
use Phplrt\Contracts\RPC\Message\ResponseInterface;

interface DispatcherInterface
{
    /**
     * Dispatch RPC method.
     *
     * @return ($request is RequestInterface ? ResponseInterface : (FailureResponseInterface|null))
     */
    public function dispatch(NotificationInterface $request): ?ResponseInterface;

    /**
     * Returns {@see true} in case of given method is available
     * or {@see false} instead.
     */
    public function has(NotificationInterface $request): bool;
}
