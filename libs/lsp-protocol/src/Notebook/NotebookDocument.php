<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * A notebook document.
 *
 * @since 3.17.0
 */
class NotebookDocument
{
    /**
     * @param string $uri The notebook document's uri.
     * @param string $notebookType The type of the notebook.
     * @param int<-2147483648, 2147483647> $version The version number of this document
     *        (it will increase after each change, including undo/redo).
     * @param ?array<string, mixed> $metadata Additional metadata stored with
     *        the notebook document.
     *        Note: should always be an object literal (e.g. LSPObject)
     * @param list<NotebookCell> $cells The cells of a notebook.
     */
    public function __construct(
        public readonly string $uri,
        public readonly string $notebookType,
        public readonly int $version,
        public readonly ?array $metadata = null,
        public readonly array $cells = [],
    ) {}
}
