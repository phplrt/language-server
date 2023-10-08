<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

use Phplrt\LanguageServer\Protocol\Type\TextDocumentItem;

/**
 * The params sent in an open notebook document notification.
 *
 * @since 3.17.0
 */
final class DidOpenNotebookDocumentParams
{
    /**
     * @param NotebookDocument $notebookDocument The notebook document that
     *        got opened.
     * @param list<TextDocumentItem> $cellTextDocuments The text documents that
     *        represent the content of a notebook cell.
     */
    public function __construct(
        public readonly NotebookDocument $notebookDocument,
        public readonly array $cellTextDocuments,
    ) {}
}
