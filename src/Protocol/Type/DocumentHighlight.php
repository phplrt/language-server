<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A document highlight is a range inside a text document which deserves
 * special attention. Usually a document highlight is visualized by changing
 * the background color of its range.
 */
final class DocumentHighlight
{
    /**
     * @param Range $range The range this highlight applies to.
     * @param DocumentHighlightKind|null $kind The highlight kind, default is
     *        {@see DocumentHighlightKind::TEXT} text.
     */
    public function __construct(
        public readonly Range $range,
        public readonly ?DocumentHighlightKind $kind = null,
    ) {
    }
}
