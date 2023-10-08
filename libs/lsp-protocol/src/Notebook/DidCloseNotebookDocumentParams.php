<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

use Phplrt\LanguageServer\Protocol\Type\TextDocumentIdentifier;

/**
 * The params sent in a close notebook document notification.
 *
 * @since 3.17.0
 */
final class DidCloseNotebookDocumentParams
{
    /**
     * @param NotebookDocumentIdentifier $notebookDocument The notebook document
     *        that got closed.
     * @param list<TextDocumentIdentifier> $cellTextDocuments The text documents
     *        that represent the content of a notebook cell that got closed.
     */
    public function __construct(
        public readonly NotebookDocumentIdentifier $notebookDocument,
        public readonly array $cellTextDocuments = [],
    ) {}
}
