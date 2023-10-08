<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

use Phplrt\LanguageServer\Protocol\Type\TextDocumentIdentifier;

final class NotebookDocumentChangeEventCellsStructure
{
    /**
     * @param NotebookCellArrayChange $array The change to the cell array.
     * @param ?list<TextDocumentIdentifier> $didOpen Additional opened cell
     *        text documents.
     * @param ?list<TextDocumentIdentifier> $didClose Additional closed cell
     *        text documents.
     */
    public function __construct(
        public readonly NotebookCellArrayChange $array,
        public readonly ?array $didOpen = null,
        public readonly ?array $didClose = null,
    ) {}
}
