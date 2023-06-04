<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A special workspace symbol that supports locations without a range.
 *
 * See also {@see SymbolInformation}.
 *
 * @since 3.17.0
 */
final class WorkspaceSymbol extends BaseSymbolInformation
{
    /**
     * @param Location|TextDocumentIdentifier $location The location of the
     *        symbol. Whether a server is allowed to return a location without a
     *        range depends on the client capability
     *        `workspace.symbol.resolveSupport`.
     *        See {@see SymbolInformation::$location} for more details.
     * @param string $name The name of this symbol.
     * @param SymbolKind $kind The kind of this symbol.
     * @param list<SymbolTag>|null $tags Tags for this symbol.
     *        @since 3.16.0
     * @param string|null $containerName The name of the symbol containing this
     *        symbol. This information is for user interface purposes (e.g. to
     *        render a qualifier in the user interface if necessary). It can't
     *        be used to re-infer a hierarchy for the document symbols.
     * @param mixed $data A data entry field that is preserved on a
     *        workspace symbol between a workspace symbol request and a
     *        workspace symbol resolve request.
     */
    public function __construct(
        public readonly Location|TextDocumentIdentifier $location,
        string $name,
        SymbolKind $kind,
        ?array $tags = null,
        ?string $containerName = null,
        public readonly mixed $data = null,
    ) {
        parent::__construct($name, $kind, $tags, $containerName);
    }
}
