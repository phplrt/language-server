<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlayHint;

use Phplrt\LanguageServer\Protocol\Type\MarkupContent;
use Phplrt\LanguageServer\Protocol\Type\Position;
use Phplrt\LanguageServer\Protocol\Type\TextEdit;

/**
 * Inlay hint information.
 *
 * @since 3.17.0
 */
final class InlayHint
{
    /**
     * @param Position $position The position of this hint.
     * @param string|list<InlayHintLabelPart> $label The label of this hint.
     *        A human-readable string or an array of InlayHintLabelPart label
     *        parts.
     *        *Note* that neither the string nor the label part can be empty.
     * @param ?InlayHintKind $kind The kind of this hint. Can be omitted in
     *        which case the client should fall back to a reasonable default.
     * @param ?list<TextEdit> $textEdits Optional text edits that are performed
     *        when accepting this inlay hint.
     *        *Note* that edits are expected to change the document so that the
     *        inlay hint (or its nearest variant) is now part of the document
     *        and the inlay hint itself is now obsolete.
     * @param string|MarkupContent|null $tooltip The tooltip text when you
     *        hover over this item.
     * @param ?bool $paddingLeft Render padding before the hint.
     *        Note: Padding should use the editor's background color, not the
     *        background color of the hint itself. That means padding can be
     *        used to visually align/separate an inlay hint.
     * @param ?bool $paddingRight Render padding after the hint.
     *        Note: Padding should use the editor's background color, not the
     *        background color of the hint itself. That means padding can be
     *        used to visually align/separate an inlay hint.
     * @param mixed $data A data entry field that is preserved on an inlay hint
     *        between a `textDocument/inlayHint` and a `inlayHint/resolve` request.
     */
    public function __construct(
        public readonly Position $position,
        public readonly string|array $label,
        public readonly ?InlayHintKind $kind = null,
        public readonly ?array $textEdits = null,
        public readonly string|MarkupContent|null $tooltip = null,
        public readonly ?bool $paddingLeft = null,
        public readonly ?bool $paddingRight = null,
        public readonly mixed $data = null,
    ) {}
}
