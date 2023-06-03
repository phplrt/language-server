<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The notebooks to be synced
 */
final class NotebookSelector
{
    /**
     * Note: One of parameter is required.
     *
     * @param string|NotebookDocumentFilter|null $notebook The notebook to be
     *        synced. If a {@see string} value is provided it matches against
     *        the notebook type: '*' matches every notebook.
     * @param NotebookSelectorCells|null $cells The cells of the matching
     *        notebook to be synced.
     */
    public function __construct(
        public readonly string|NotebookDocumentFilter|null $notebook = null,
        public readonly NotebookSelectorCells|null $cells = null,
    ) {
        assert($notebook !== null || $cells !== null);
    }
}
