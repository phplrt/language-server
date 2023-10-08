<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceSymbol;

use Phplrt\LanguageServer\Protocol\Type\SymbolTag;

final class WorkspaceSymbolTagSupport
{
    /**
     * @param list<SymbolTag> $valueSet The tags supported by the client.
     */
    public function __construct(
        public readonly array $valueSet = [],
    ) {}
}
