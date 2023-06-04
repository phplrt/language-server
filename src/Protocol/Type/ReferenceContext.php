<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Value-object that contains additional information when requesting references.
 */
final class ReferenceContext
{
    /**
     * @param bool $includeDeclaration Include the declaration of the current
     *        symbol.
     */
    public function __construct(
        public readonly bool $includeDeclaration,
    ) {
    }
}
