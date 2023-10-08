<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A text edit applicable to a text document.
 */
class TextEdit
{
    /**
     * @param Range $range The range of the text document to be manipulated.
     *        To insert text into a document create a range where `start === end`.
     * @param string $newText The string to be inserted. For delete operations
     *        use an empty string.
     */
    public function __construct(
        public readonly Range $range,
        public readonly string $newText,
    ) {}
}
