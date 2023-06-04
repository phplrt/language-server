<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * A special text edit with an additional change annotation.
 *
 * @since 3.16.0.
 */
final class AnnotatedTextEdit extends TextEdit
{
    /**
     * @param string $annotationId The actual identifier of the change
     *        annotation.
     * @param Range $range The range of the text document to be manipulated.
     *        To insert text into a document create a range where start === end.
     * @param string $newText The string to be inserted. For delete operations
     *        use an empty string.
     */
    public function __construct(
        public readonly string $annotationId,
        Range $range,
        string $newText,
    ) {
        parent::__construct($range, $newText);
    }

    /**
     * Creates an annotated replace text edit.
     *
     * @param Range $range The range of text to be replaced.
     * @param string $newText The new text.
     * @param string|null $annotation The annotation.
     *
     * @return ($annotation is null ? TextEdit : AnnotatedTextEdit)
     */
    public static function replace(Range $range, string $newText, string $annotation = null): TextEdit|AnnotatedTextEdit
    {
        if ($annotation === null) {
            return parent::replace($range, $newText);
        }

        return new self($annotation, $range, $newText);
    }

    /**
     * Creates an insert text edit.
     *
     * @param Position $position The position to insert the text at.
     * @param string $newText The text to be inserted.
     * @param string|null $annotation The annotation.
     *
     * @return ($annotation is null ? TextEdit : AnnotatedTextEdit)
     */
    public static function insert(Position $position, string $newText, string $annotation = null): TextEdit|AnnotatedTextEdit
    {
        if ($annotation === null) {
            return parent::insert($position, $newText);
        }

        return new self($annotation, new Range($position, $position), $newText);
    }

    /**
     * Creates a delete text edit.
     *
     * @param Range $range The range of text to be deleted.
     * @param string|null $annotation The annotation.
     *
     * @return ($annotation is null ? TextEdit : AnnotatedTextEdit)
     */
    public static function del(Range $range, string $annotation = null): TextEdit|AnnotatedTextEdit
    {
        if ($annotation === null) {
            return parent::del($range);
        }

        return new self($annotation, $range, '');
    }
}
