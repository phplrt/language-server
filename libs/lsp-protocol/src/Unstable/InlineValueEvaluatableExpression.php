<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * Provide an inline value through an expression evaluation. If only a range is
 * specified, the expression will be extracted from the underlying document. An
 * optional expression can be used to override the extracted expression.
 *
 * @since 3.17.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class InlineValueEvaluatableExpression
{
    /**
     * @param Range $range The document range for which the inline value applies. The
     *        range is used to extract the evaluatable expression from the underlying
     *        document.
     * @param ?string $expression If specified the expression overrides the
     *        extracted expression.
     */
    public function __construct(
        public readonly Range $range,
        public readonly ?string $expression = null,
    ) {}
}
