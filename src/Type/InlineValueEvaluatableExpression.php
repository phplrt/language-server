<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * Provide an inline value through an expression evaluation.
 *
 * If only a range is specified, the expression will be extracted from the
 * underlying document.
 *
 * An optional expression can be used to override the extracted expression.
 *
 * @since 3.17.0
 */
final class InlineValueEvaluatableExpression
{
    /**
     * @param Range $range The document range for which the inline value applies.
     *        The range is used to extract the evaluatable expression from the
     *        underlying document.
     * @param string|null $expression If specified the expression overrides the
     *        extracted expression.
     */
    public function __construct(
        public readonly Range $range,
        public readonly ?string $expression,
    ) {}
}
