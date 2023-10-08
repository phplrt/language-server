<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceSymbol;

use Phplrt\LanguageServer\Protocol\Type\SymbolKind;

final class WorkspaceSymbolSymbolKind
{
    /**
     * @param ?list<SymbolKind> $valueSet The symbol kind values the client
     *        supports. When this property exists the client also guarantees
     *        that it will handle values outside its set gracefully and falls
     *        back to a default value when unknown.
     *        If this property is not present the client only supports the
     *        symbol kinds from `File` to `Array` as defined in the initial
     *        version of the protocol.
     */
    public function __construct(
        public readonly ?array $valueSet = null,
    ) {}
}
