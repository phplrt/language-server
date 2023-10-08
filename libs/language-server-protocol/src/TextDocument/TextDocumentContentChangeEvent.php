<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\Type\Range;

final class TextDocumentContentChangeEvent
{
    /**
     * @param null|Range $range The range of the document that changed.
     * @param null|int<0, 2147483647> $rangeLength The optional length of the
     *        range that got replaced.
     *        - {@deprecated use range instead}.
     * @param string $text The new text of the whole document in case
     *        of {@see $range} and {@see $rangeLength} equals {@see null} or
     *        the new text for the provided range instead.
     */
    public function __construct(
        public readonly string $text,
        public readonly ?Range $range = null,
        public readonly ?int $rangeLength = null,
    ) {}
}
