<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FoldingRange;

use Phplrt\LanguageServer\Protocol\Type\FoldingRangeKind;

final class ClientCapabilitiesFoldingRangeKind
{
    /**
     * @param ?list<FoldingRangeKind> $valueSet The folding range kind
     *        values the client supports. When this property exists the client also
     *        guarantees that it will handle values outside its set gracefully and
     *        falls back to a default value when unknown.
     */
    public function __construct(
        public readonly ?array $valueSet = null,
    ) {}
}
