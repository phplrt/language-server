<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * A notebook cell text document filter denotes a cell text document by different
 * properties.
 *
 * @since 3.17.0
 */
class NotebookCellTextDocumentFilter
{
    /**
     * @param string|NotebookCellTextDocumentFilterNotebook $notebook
     *        A filter that matches against the notebook containing the notebook cell.
     *        If a string value is provided it matches against the notebook type. '*'
     *        matches every notebook.
     * @param ?string $language A language id like {@see $python}.
     *         Will be matched against the language id of the notebook cell document.
     *        '*' matches every language.
     */
    public function __construct(
        public readonly string|NotebookCellTextDocumentFilterNotebook $notebook = new NotebookCellTextDocumentFilterNotebook(),
        public readonly ?string $language = null,
    ) {}
}
