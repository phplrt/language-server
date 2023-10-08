<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\CallHierarchy;

use Phplrt\LanguageServer\Protocol\Type\Range;
use Phplrt\LanguageServer\Protocol\Type\SymbolKind;
use Phplrt\LanguageServer\Protocol\Type\SymbolTag;

/**
 * Represents programming constructs like functions or constructors in the context
 * of call hierarchy.
 *
 * @since 3.16.0
 */
final class CallHierarchyItem
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
     *        contained by the {@link CallHierarchyItem.range {@see $range}}.
     * @param mixed $data A data entry field that is preserved between a call hierarchy
     *        prepare and incoming calls or outgoing calls requests.
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
