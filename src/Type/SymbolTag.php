<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

enum SymbolTag: int
{
    /**
     * Render a symbol as obsolete, usually using a strike-out.
     */
    case DEPRECATED = 1;
}
