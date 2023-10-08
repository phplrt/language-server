<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

final class NotebookDocumentChangeEventCells
{
    /**
     * @param ?NotebookDocumentChangeEventCellsStructure $structure Changes to the cell
     *        structure to add or remove cells.
     * @param ?list<NotebookCell> $data Changes to notebook cells properties like its
     *        kind, execution summary or metadata.
     * @param ?list<NotebookDocumentChangeEventCellsTextContent> $textContent Changes
     *        to the text content of notebook cells.
     */
    public function __construct(
        public readonly ?NotebookDocumentChangeEventCellsStructure $structure = null,
        public readonly ?array $data = null,
        public readonly ?array $textContent = null,
    ) {}
}
