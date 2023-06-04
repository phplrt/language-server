<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * Represents the signature of something callable. A signature can have a label,
 * like a function-name, a doc-comment, and a set of parameters.
 */
final class SignatureInformation
{
    /**
     * @param string $label The label of this signature. Will be shown in the UI.
     * @param string|MarkupContent|null $documentation The human-readable
     *        doc-comment of this signature. Will be shown in the UI but can be
     *        omitted.
     * @param list<ParameterInformation>|null $parameters The parameters of this
     *        signature.
     * @param int<0, max>|null $activeParameter The index of the active
     *        parameter. If provided, this is used in place of
     *        {@see SignatureHelp::$activeParameter}.
     *        @since 3.16.0
     */
    public function __construct(
        public readonly string $label,
        public readonly string|MarkupContent|null $documentation,
        public readonly ?array $parameters,
        public readonly ?int $activeParameter,
    ) {}
}
