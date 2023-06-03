<?php

declare(strict_types=1);

namespace Phplrt\RPC\Dispatcher;

use Phplrt\RPC\Message\FailureResponseInterface;
use Phplrt\RPC\Message\NotificationInterface;
use Phplrt\RPC\Message\RequestInterface;
use Phplrt\RPC\Message\ResponseInterface;

interface DispatcherInterface
{
    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function dispatchMethod(RequestInterface $request): ResponseInterface;

    /**
     * @param NotificationInterface $notification
     */
    public function dispatchProcedure(NotificationInterface $notification): ?FailureResponseInterface;
}
