<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InitializeParams;

final class InitializeParamsClientInfo
{
    /**
     * @param non-empty-string $name The name of the client as defined by the client.
     * @param ?non-empty-string $version The client's version as defined by the client.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $version = null,
    ) {}
}
