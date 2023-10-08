<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * Provide inline value through a variable lookup. If only a range is specified,
 * the variable name will be extracted from the underlying document. An optional
 * variable name can be used to override the extracted name.
 *
 * @since 3.17.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class InlineValueVariableLookup
{
    /**
     * @param Range $range The document range for which the inline value applies. The
     *        range is used to extract the variable name from the underlying document.
     * @param ?string $variableName If specified the name of the variable to
     *        look up.
     * @param bool $caseSensitiveLookup How to perform the lookup.
     */
    public function __construct(
        public readonly Range $range,
        public readonly ?string $variableName = null,
        public readonly bool $caseSensitiveLookup,
    ) {}
}
