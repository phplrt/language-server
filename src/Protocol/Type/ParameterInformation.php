<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Represents a parameter of a callable-signature. A parameter can have a label
 * and a doc-comment.
 */
final class ParameterInformation
{
    /**
     * @param string|array{int<0, max>, int<0, max>} $label The label of this
     *        parameter information.
     *
     *        Either a string or an inclusive start and exclusive end offsets
     *        within its containing signature label:
     *        {@see SignatureInformation::$label}. The offsets are based on a
     *        UTF-16 string representation as {@see Position} and {@see Range}
     *        does.
     *
     *         - *Note*: a label of type string should be a substring of its
     *           containing signature label. Its intended use case is to
     *           highlight the parameter label part in
     *           the {@see SignatureInformation::$label}.
     * @param string|MarkupContent|null $documentation The human-readable
     *        doc-comment of this parameter. Will be shown in the UI but can
     *        be omitted.
     */
    public function __construct(
        public readonly string|array $label,
        public readonly string|MarkupContent|null $documentation,
    ) {
    }
}
