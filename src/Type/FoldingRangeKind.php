<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * A set of predefined range kinds.
 */
enum FoldingRangeKind: string implements FoldingRangeKindInterface
{
    /**
     * Folding range for a comment
     */
    case COMMENT = 'comment';

    /**
     * Folding range for an import or include
     */
    case IMPORTS = 'imports';

    /**
     * Folding range for a region (e.g. `#region`)
     */
    case REGION = 'region';

    public static function create(string $name): FoldingRangeKindInterface
    {
        return self::tryFrom($name) ?? new UserFoldingRangeKind($name);
    }

    public function getName(): string
    {
        return $this->value;
    }
}
