<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * A document highlight kind.
 */
enum DocumentHighlightKind: int
{
    /**
     * A textual occurrence.
     */
    case TEXT = 1;

    /**
     * Read-access of a symbol, like reading a variable.
     */
    case READ = 2;

    /**
     * Write-access of a symbol, like writing to a variable.
     */
    case WRITE = 3;
}
