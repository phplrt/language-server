<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A set of predefined range kinds.
 */
enum FoldingRangeKind: string
{
    /**
     * Folding range for a comment
     */
    case COMMENT = "comment";

    /**
     * Folding range for an import or include
     */
    case IMPORTS = "imports";

    /**
     * Folding range for a region (e.g. `#region`)
     */
    case REGION = "region";
}
