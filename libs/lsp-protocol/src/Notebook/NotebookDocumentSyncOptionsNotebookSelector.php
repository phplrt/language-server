<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookDocumentSyncOptionsNotebookSelectorCells;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
final class NotebookDocumentSyncOptionsNotebookSelector
{
    /**
     * @param string|NotebookCellTextDocumentFilterNotebook|null $notebook
     *        The notebook to be synced If a string value is provided it matches
     *        against the notebook type. '*' matches every notebook.
     * @param list<NotebookDocumentSyncOptionsNotebookSelectorCells>|null $cells
     *        The cells of the matching notebook to be synced.
     */
    public function __construct(
        public readonly string|NotebookCellTextDocumentFilterNotebook|null $notebook = null,
        public readonly ?array $cells = null,
    ) {}
}
