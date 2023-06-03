<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The cells of the matching notebook to be synced.
 */
final class NotebookSelectorCells
{
    public function __construct(
        public readonly string $language,
    ) {
    }
}
