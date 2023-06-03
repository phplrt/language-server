<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer;

use Phplrt\LanguageServer\Connection\ConnectionInterface;

interface ServerInterface
{
    /**
     * @param callable(ConnectionInterface):void $callback
     */
    public function onConnect(callable $callback): void;

    /**
     * @param callable(ConnectionInterface):void $callback
     */
    public function onDisconnect(callable $callback): void;
}
