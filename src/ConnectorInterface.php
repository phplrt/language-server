<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer;

use Phplrt\LanguageServer\Connection\ConnectionInterface;

interface ConnectorInterface
{
    /**
     * @param ConnectionInterface $connection
     * @return ServerInterface
     */
    public function connect(ConnectionInterface $connection): ServerInterface;
}
