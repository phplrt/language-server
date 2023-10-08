<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * Client Capabilities for a {@link DocumentSymbolRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *                 changed in the future.
 */
class DocumentSymbolClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether document symbol supports dynamic
     *        registration.
     * @param ?DocumentSymbolClientCapabilitiesSymbolKind $symbolKind Specific
     *        capabilities for the `SymbolKind` in the
     *        `textDocument/documentSymbol` request.
     * @param ?bool $hierarchicalDocumentSymbolSupport The client supports hierarchical
     *        document symbols.
     * @param ?DocumentSymbolClientCapabilitiesTagSupport $tagSupport The client
     *        supports tags on `SymbolInformation`. Tags are supported on
     *        `DocumentSymbol` if {@see $hierarchicalDocumentSymbolSupport} is set to true.
     *        Clients supporting tags have to handle unknown tags gracefully.
     *        - {@since 3.16.0}
     * @param ?bool $labelSupport The client supports an additional label presented in
     *        the UI when registering a document symbol provider.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?DocumentSymbolClientCapabilitiesSymbolKind $symbolKind = null,
        public readonly ?bool $hierarchicalDocumentSymbolSupport = null,
        public readonly ?DocumentSymbolClientCapabilitiesTagSupport $tagSupport = null,
        public readonly ?bool $labelSupport = null,
    ) {}
}
