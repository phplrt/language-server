<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A base for all symbol information.
 */
class BaseSymbolInformation
{
    /**
     * @param string $name The name of this symbol.
     * @param SymbolKind $kind The kind of this symbol.
     * @param list<SymbolTag>|null $tags Tags for this symbol.
     *        - @since 3.16.0
     * @param string|null $containerName The name of the symbol containing this
     *        symbol. This information is for user interface purposes (e.g. to
     *        render a qualifier in the user interface if necessary). It can't
     *        be used to re-infer a hierarchy for the document symbols.
     */
    public function __construct(
        public readonly string $name,
        public readonly SymbolKind $kind,
        public readonly ?array $tags = null,
        public readonly ?string $containerName = null,
    ) {}
}
