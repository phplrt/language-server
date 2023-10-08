<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * A change event for a notebook document.
 *
 * @since 3.17.0
 */
class NotebookDocumentChangeEvent
{
    /**
     * @param ?array<string, mixed> $metadata The changed meta data if any.
     *         Note: should always be an object literal (e.g. LSPObject)
     * @param ?NotebookDocumentChangeEventCells $cells Changes to cells.
     */
    public function __construct(
        public readonly ?array $metadata = null,
        public readonly ?NotebookDocumentChangeEventCells $cells = null,
    ) {}
}
