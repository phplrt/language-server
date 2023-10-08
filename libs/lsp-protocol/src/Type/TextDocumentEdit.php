<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

use Phplrt\LanguageServer\Protocol\Type\OptionalVersionedTextDocumentIdentifier;

/**
 * Describes textual changes on a text document. A TextDocumentEdit describes all
 * changes on a document version Si and after they are applied move the document to
 * version Si+1. So the creator of a TextDocumentEdit doesn't need to sort the
 * array of edits or do any kind of ordering. However the edits must be non
 * overlapping.
 */
final class TextDocumentEdit
{
    /**
     * @param OptionalVersionedTextDocumentIdentifier $textDocument The text
     *        document to change.
     * @param list<AnnotatedTextEdit> $edits The edits to be applied
     *         client capability.
     *        - {@since 3.16.0} - support for AnnotatedTextEdit. This is guarded
     *          using a client capability.
     */
    public function __construct(
        public readonly OptionalVersionedTextDocumentIdentifier $textDocument,
        public readonly array $edits,
    ) {}
}
