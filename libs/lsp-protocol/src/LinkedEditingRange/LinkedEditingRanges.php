<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\LinkedEditingRange;

use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * The result of a linked editing range request.
 *
 * @since 3.16.0
 */
final class LinkedEditingRanges
{
    /**
     * @param list<Range> $ranges A list of ranges that can be edited together.
     *        The ranges must have identical length and contain identical text
     *        content. The ranges cannot overlap.
     * @param ?string $wordPattern An optional word pattern (regular expression)
     *        that describes valid contents for the given ranges. If no pattern
     *        is provided, the client configuration's word pattern will be used.
     */
    public function __construct(
        public readonly array $ranges,
        public readonly ?string $wordPattern = null,
    ) {}
}
