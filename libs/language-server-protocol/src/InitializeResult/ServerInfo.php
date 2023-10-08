<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InitializeResult;

final class ServerInfo
{
    /**
     * @param string $name The name of the server as defined by the server.
     * @param ?string $version The server's version as defined by the server.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $version = null,
    ) {}
}
