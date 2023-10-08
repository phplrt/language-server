<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * @since 3.17.0
 */
final class TypeHierarchyItem
{
    /**
     * @param string $name The name of this item.
     * @param SymbolKind $kind The kind of this item.
     * @param ?list<SymbolTag> $tags Tags for this item.
     * @param ?string $detail More detail for this item, e.g. the signature
     *        of a function.
     * @param string $uri The resource identifier of this item.
     * @param Range $range The range enclosing this symbol not including
     *        leading/trailing whitespace but everything else, e.g. comments and code.
     * @param Range $selectionRange The range that should be selected and revealed when
     *        this symbol is being picked, e.g. the name of a function. Must be
     *        contained by the
     *        {@link TypeHierarchyItem.range {@see $range}}.
     * @param mixed $data A data entry field that is preserved between a type hierarchy
     *        prepare and supertypes or subtypes requests. It could also be used to
     *        identify the type hierarchy in the server, helping improve the
     *        performance on resolving supertypes and subtypes.
     */
    public function __construct(
        public readonly string $name,
        public readonly SymbolKind $kind,
        public readonly string $uri,
        public readonly Range $range,
        public readonly Range $selectionRange,
        public readonly ?array $tags = null,
        public readonly ?string $detail = null,
        public readonly mixed $data = null,
    ) {}
}
