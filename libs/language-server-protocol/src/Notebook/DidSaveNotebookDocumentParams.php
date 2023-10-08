<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * The params sent in a save notebook document notification.
 *
 * @since 3.17.0
 */
final class DidSaveNotebookDocumentParams
{
    /**
     * @param NotebookDocumentIdentifier $notebookDocument The notebook document
     *        that got saved.
     */
    public function __construct(
        public readonly NotebookDocumentIdentifier $notebookDocument,
    ) {}
}
