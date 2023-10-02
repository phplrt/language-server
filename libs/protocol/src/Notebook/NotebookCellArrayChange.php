<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * A change describing how to move a {@see NotebookCell} array
 * from state S to S'.
 *
 * @since 3.17.0
 */
final class NotebookCellArrayChange
{
    /**
     * @param int<0, max> $start The start oftest of the cell that changed.
     * @param int<0, max> $deleteCount The deleted cells.
     * @param array|null $cells The new cells, if any.
     */
    public function __construct(
        public readonly int $start,
        public readonly int $deleteCount,
        public readonly ?array $cells = null,
    ) {
    }
}
