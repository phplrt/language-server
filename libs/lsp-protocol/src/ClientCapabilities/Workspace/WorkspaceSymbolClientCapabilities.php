<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace;

use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceSymbol\WorkspaceSymbolResolveSupport;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceSymbol\WorkspaceSymbolSymbolKind;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceSymbol\WorkspaceSymbolTagSupport;

/**
 * Client capabilities for a `workspace/symbol`.
 */
class WorkspaceSymbolClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Symbol request supports dynamic registration.
     * @param ?WorkspaceSymbolSymbolKind $symbolKind Specific
     *        capabilities for the `SymbolKind` in the `workspace/symbol` request.
     * @param ?WorkspaceSymbolTagSupport $tagSupport The client
     *        supports tags on `SymbolInformation`. Clients supporting tags have to
     *        handle unknown tags gracefully.
     *        - {@since 3.16.0}
     * @param ?WorkspaceSymbolResolveSupport $resolveSupport
     *        The client support partial workspace symbols. The client will send the
     *        request `workspaceSymbol/resolve` to the server to resolve additional
     *        properties.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?WorkspaceSymbolSymbolKind $symbolKind = null,
        public readonly ?WorkspaceSymbolTagSupport $tagSupport = null,
        public readonly ?WorkspaceSymbolResolveSupport $resolveSupport = null,
    ) {}
}
