<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * A notebook cell kind.
 *
 * @since 3.17.0
 */
enum NotebookCellKind: int
{
    /**
     * A markup-cell is formatted source that is used for display.
     */
    case MARKUP = 1;

    /**
     * A code-cell is source code.
     */
    case CODE = 2;
}
