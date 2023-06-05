<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * A notebook cell.
 *
 * A cell's document URI must be unique across ALL notebook cells and can
 * therefore be used to uniquely identify a notebook cell or the cell's text
 * document.
 *
 * @since 3.17.0
 */
final class NotebookCell
{
    /**
     * @param NotebookCellKind $kind The cell's kind
     * @param string $document The URI of the cell's text document content.
     * @param object|null $metadata Additional metadata stored with the cell.
     *         - Note: should always be an object literal.
     * @param ExecutionSummary|null $executionSummary Additional execution
     *        summary information if supported by the client.
     */
    public function __construct(
        public readonly NotebookCellKind $kind,
        public readonly string $document,
        public readonly ?object $metadata = null,
        public readonly ?ExecutionSummary $executionSummary = null,
    ) {}
}
