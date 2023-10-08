<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Represents information about programming constructs like variables, classes,
 * interfaces etc.
 */
final class SymbolInformation extends BaseSymbolInformation
{
    /**
     * @param ?bool $deprecated Indicates if this symbol is deprecated.
     *        - {@deprecated Use tags instead}.
     * @param Location $location The location of this symbol. The location's
     *        range is used by a tool to reveal the location in the editor.
     *        If the symbol is selected in the tool the range's start
     *        information is used to position the cursor. So the range usually
     *        spans more than the actual symbol's name and does normally include
     *        things like visibility modifiers.
     *        The range doesn't have to denote a node range in the sense of an
     *        abstract syntax tree. It can therefore not be used to re-construct
     *        a hierarchy of the symbols.
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
        public readonly Location $location,
        string $name,
        SymbolKind $kind,
        public readonly ?bool $deprecated = null,
        ?array $tags = null,
        ?string $containerName = null,
    ) {
        parent::__construct($name, $kind, $tags, $containerName);
    }
}
