<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * An event describing a change to a text document. If only a text is provided
 * it is considered to be the full content of the document.
 */
final class TextDocumentContentChangeEvent
{
    /**
     * @param Range|null $range The range of the document that changed.
     * @param int|null $rangeLength The optional length of the range that got
     *        replaced.
     *        @deprecated use {@see $range} instead.
     * @param string $text The new text for the provided range or the new text
     *        of the whole document in case of {@see $range} is {@see null}.
     */
    public function __construct(
        public readonly ?Range $range = null,
        public readonly ?int $rangeLength = null,
        public readonly string $text = '',
    ) {
    }
}
