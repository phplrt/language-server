<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A special text edit with an additional change annotation.
 *
 * @since 3.16.0.
 */
final class AnnotatedTextEdit extends TextEdit
{
    /**
     * @param string $annotationId The actual identifier of the change
     *        annotation
     * @param Range $range The range of the text document to be manipulated.
     *        To insert text into a document create a range where start === end.
     * @param string $newText The string to be inserted. For delete
     *        operations use an empty string.
     */
    public function __construct(
        public readonly string $annotationId,
        Range $range,
        string $newText,
    ) {
        parent::__construct($range, $newText);
    }
}
