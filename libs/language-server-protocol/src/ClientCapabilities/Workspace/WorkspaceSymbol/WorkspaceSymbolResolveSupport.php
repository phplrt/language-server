<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceSymbol;

final class WorkspaceSymbolResolveSupport
{
    /**
     * @param list<string> $properties The properties that a client can resolve
     *        lazily. Usually `location.range`
     */
    public function __construct(
        public readonly array $properties = [],
    ) {}
}
