<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC;

use Phplrt\LanguageServer\RPC\Message\FailureResponseInterface;
use Phplrt\LanguageServer\RPC\Message\NotificationInterface;
use Phplrt\LanguageServer\RPC\Message\RequestInterface;
use Phplrt\LanguageServer\RPC\Message\ResponseInterface;

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
