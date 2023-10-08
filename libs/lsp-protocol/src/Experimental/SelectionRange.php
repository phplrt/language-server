<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * A selection range represents a part of a selection hierarchy. A selection range
 * may have a parent selection range that contains it.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class SelectionRange
{
    /**
     * @param Range $range The {@link Range range} of this selection range.
     * @param ?SelectionRange $parent The parent selection range containing this range.
     *        Therefore `parent.range` must contain `this.range`.
     */
    public function __construct(
        public readonly Range $range,
        public readonly ?SelectionRange $parent = null,
    ) {}
}
