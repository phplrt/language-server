<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

/**
 * @since 3.16.0
 */
final class SemanticTokensPartialResult
{
    /**
     * @param list<int<0, 2147483647>> $data
     */
    public function __construct(
        public readonly array $data,
    ) {}
}
