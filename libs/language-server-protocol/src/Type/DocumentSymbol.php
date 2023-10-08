<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Represents programming constructs like variables, classes, interfaces etc. that
 * appear in a document. Document symbols can be hierarchical and they have two
 * ranges: one that encloses its definition and one that points to its most
 * interesting range, e.g. the range of an identifier.
 */
final class DocumentSymbol
{
    /**
     * @param string $name The name of this symbol. Will be displayed in the
     *        user interface and therefore must not be an empty string or a
     *        string only consisting of white spaces.
     * @param ?string $detail More detail for this symbol, e.g the signature
     *        of a function.
     * @param SymbolKind $kind The kind of this symbol.
     * @param ?list<SymbolTag> $tags Tags for this document symbol.
     *        - {@since 3.16.0}
     * @param ?bool $deprecated Indicates if this symbol is deprecated.
     *        - {@deprecated Use tags instead}
     * @param Range $range The range enclosing this symbol not including
     *        leading/trailing whitespace but everything else like comments.
     *        This information is typically used to determine if the clients
     *        cursor is inside the symbol to reveal in the symbol in the UI.
     * @param Range $selectionRange The range that should be selected and
     *        revealed when this symbol is being picked, e.g the name of a
     *        function. Must be contained by the {@see $range}.
     * @param ?list<SymbolTag> $children Children of this symbol, e.g.
     *        properties of a class.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $detail = null,
        public readonly SymbolKind $kind = SymbolKind::KIND_FILE,
        public readonly ?array $tags = null,
        public readonly ?bool $deprecated = null,
        public readonly Range $range = new Range(),
        public readonly Range $selectionRange = new Range(),
        public readonly ?array $children = null,
    ) {}
}
