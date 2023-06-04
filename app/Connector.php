<?php

declare(strict_types=1);

namespace App;

use Phplrt\LanguageServer\Connection\ConnectionInterface;
use Phplrt\LanguageServer\ConnectorInterface;
use Phplrt\LanguageServer\ServerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

final class Connector implements ConnectorInterface
{
    public function __construct(
        private readonly LoggerInterface $logger = new NullLogger(),
    ) {
    }

    public function connect(ConnectionInterface $connection): ServerInterface
    {
        return new Server($this->logger, $connection);
    }
}
