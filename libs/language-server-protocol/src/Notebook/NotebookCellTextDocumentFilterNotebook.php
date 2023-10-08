<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

final class NotebookCellTextDocumentFilterNotebook
{
    /**
     * @param ?string $notebookType The type of the enclosing notebook.
     * @param ?string $scheme A Uri {@link Uri.scheme scheme}, like
     *        `file` or `untitled`.
     * @param ?string $pattern A glob pattern.
     */
    public function __construct(
        public readonly ?string $notebookType = null,
        public readonly ?string $scheme = null,
        public readonly ?string $pattern = null,
    ) {}
}
