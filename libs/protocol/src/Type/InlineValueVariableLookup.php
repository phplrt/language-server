<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Provide inline value through a variable lookup.
 *
 * If only a range is specified, the variable name will be extracted from the
 * underlying document.
 *
 * An optional variable name can be used to override the extracted name.
 *
 * @since 3.17.0
 */
final class InlineValueVariableLookup
{
    /**
     * @param Range $range The document range for which the inline value applies.
     *        The range is used to extract the variable name from the underlying
     *        document.
     * @param string|null $variableName If specified the name of the variable to
     *        look up.
     * @param bool $caseSensitiveLookup How to perform the lookup.
     */
    public function __construct(
        public readonly Range $range,
        public readonly ?string $variableName,
        public readonly bool $caseSensitiveLookup,
    ) {}
}
