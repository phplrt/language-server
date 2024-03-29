<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * Provide inline value as text.
 *
 * @since 3.17.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class InlineValueText
{
    /**
     * @param Range $range The document range for which the inline value applies.
     * @param string $text The text of the inline value.
     */
    public function __construct(
        public readonly Range $range,
        public readonly string $text,
    ) {}
}
