<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

final class WorkspaceSymbolLocation
{
    /**
     * @param string $uri
     */
    public function __construct(
        public readonly string $uri,
    ) {}
}
