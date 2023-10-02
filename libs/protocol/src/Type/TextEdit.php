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
     *        To insert text into a document create a range where start === end.
     * @param string $newText The string to be inserted. For delete operations
     *        use an empty string.
     */
    public function __construct(
        public readonly Range $range,
        public readonly string $newText,
    ) {}

    /**
     * Creates a replace text edit.
     *
     * @param Range $range The range of text to be replaced.
     * @param string $newText The new text.
     */
    public static function replace(Range $range, string $newText): self
    {
        return new self($range, $newText);
    }

    /**
     * Creates an insert text edit.
     *
     * @param Position $position The position to insert the text at.
     * @param string $newText The text to be inserted.
     */
    public static function insert(Position $position, string $newText): self
    {
        return new self(new Range($position, $position), $newText);
    }

    /**
     * Creates a delete text edit.
     *
     * @param Range $range The range of text to be deleted.
     */
    public static function del(Range $range): self
    {
        return new self($range, '');
    }
}
