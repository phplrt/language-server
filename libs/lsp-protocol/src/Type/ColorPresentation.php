<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

use Phplrt\LanguageServer\Protocol\Type\TextEdit;

final class ColorPresentation
{
    /**
     * @param string $label The label of this color presentation. It will be
     *        shown on the color picker header. By default this is also the text that
     *        is inserted when selecting this color presentation.
     * @param ?TextEdit $textEdit An {@see TextEdit} edit which is applied to a
     *        document when selecting this presentation for the color.
     *        When `falsy` the {@see ColorPresentation::$label} label is used.
     * @param ?list<TextEdit> $additionalTextEdits An optional array of
     *        additional {@see TextEdit} text edits that are applied when
     *        selecting this color presentation. Edits must not overlap with the
     *        main {@see ColorPresentation::$textEdit} edit nor with themselves.
     */
    public function __construct(
        public readonly string $label,
        public readonly ?TextEdit $textEdit = null,
        public readonly ?array $additionalTextEdits = null,
    ) {}
}
