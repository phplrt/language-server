<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Connection;

use Phplrt\LanguageServer\RPC\Message\NotificationInterface;
use Phplrt\LanguageServer\RPC\Message\RequestInterface;

interface ReceiverInterface
{
    /**
     * @param callable(RequestInterface, array<non-empty-string, string>):void $callback
     */
    public function onRequest(callable $callback): void;

    /**
     * @param callable(NotificationInterface, array<non-empty-string, string>):void $callback
     *
     * @return void
     */
    public function onNotification(callable $callback): void;
}
