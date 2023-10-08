<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

/**
 * @since 3.16.0
 */
final class SemanticTokensEdit
{
    /**
     * @param int<0, 2147483647> $start The start offset of the edit.
     * @param int<0, 2147483647> $deleteCount The count of elements to remove.
     * @param ?list<int<0, 2147483647>> $data The elements to insert.
     */
    public function __construct(
        public readonly int $start,
        public readonly int $deleteCount,
        public readonly ?array $data = null,
    ) {}
}
