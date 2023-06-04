<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * A range in a text document expressed as (zero-based) start and end positions.
 *
 * If you want to specify a range that contains a line including the line ending
 * character(s) then use an end position denoting the start of the next line.
 * For example:
 * ```ts
 * {
 *     start: { line: 5, character: 23 }
 *     end : { line 6, character : 0 }
 * }
 * ```
 */
final class Range
{
    /**
     * @param Position $start The range's start position.
     * @param Position $end The range's end position.
     */
    public function __construct(
        public readonly Position $start = new Position(),
        public readonly Position $end = new Position(),
    ) {}
}
