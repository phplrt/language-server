<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\Symbol\ResolveSupportCapabilities;
use Phplrt\LanguageServer\Protocol\Symbol\SymbolKindCapabilities;
use Phplrt\LanguageServer\Protocol\Symbol\TagSupportCapabilities;
use Phplrt\LanguageServer\Type\SymbolKind;

/**
 * Client capabilities for a "workspace/symbol" RPC request.
 */
final class WorkspaceSymbolClientCapabilities
{
    /**
     * @param bool|null $dynamicRegistration Symbol request supports dynamic
     *        registration.
     * @param SymbolKindCapabilities|null $symbolKind Specific capabilities for
     *        the {@see SymbolKind} in the `workspace/symbol` request.
     * @param TagSupportCapabilities|null $tagSupport The client supports tags
     *        on `SymbolInformation`. Clients supporting tags have to handle
     *        unknown tags gracefully.
     *        @since 3.16.0
     * @param ResolveSupportCapabilities|null $resolveSupport The client support
     *        partial workspace symbols. The client will send the request
     *        `workspaceSymbol/resolve` to the server to resolve additional
     *        properties.
     *        @since 3.17.0
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?SymbolKindCapabilities $symbolKind = null,
        public readonly ?TagSupportCapabilities $tagSupport = null,
        public readonly ?ResolveSupportCapabilities $resolveSupport = null,
    ) {}
}
