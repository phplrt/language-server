<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

final class NotebookDocumentSyncOptionsNotebookSelectorCells
{
    /**
     * @param string $language
     */
    public function __construct(
        public readonly string $language,
    ) {}
}
