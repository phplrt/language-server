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
     * @param Location|WorkspaceSymbolLocation $location The location of the symbol.
     *        Whether a server is allowed to return a location without a range depends
     *        on the client capability `workspace.symbol.resolveSupport`.
     *        See SymbolInformation#location for more details.
     * @param mixed $data A data entry field that is preserved on a workspace
     *        symbol between a workspace symbol request and a workspace symbol
     *        resolve request.
     * @param string $name The name of this symbol.
     * @param SymbolKind $kind The kind of this symbol.
     * @param ?list<SymbolTag> $tags Tags for this symbol.
     *        - {@since 3.16.0}
     * @param ?string $containerName The name of the symbol containing this
     *        symbol. This information is for user interface purposes (e.g. to
     *        render a qualifier in the user interface if necessary). It can't
     *        be used to re-infer a hierarchy for the document symbols.
     */
    public function __construct(
        public readonly Location|WorkspaceSymbolLocation $location,
        string $name,
        SymbolKind $kind,
        public readonly mixed $data = null,
        ?array $tags = null,
        ?string $containerName = null,
    ) {
        parent::__construct($name, $kind, $tags, $containerName);
    }
}
