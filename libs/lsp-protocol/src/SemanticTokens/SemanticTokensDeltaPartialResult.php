<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

use Phplrt\LanguageServer\Protocol\SemanticTokens\SemanticTokensEdit;

/**
 * @since 3.16.0
 */
final class SemanticTokensDeltaPartialResult
{
    /**
     * @param list<SemanticTokensEdit> $edits
     */
    public function __construct(
        public readonly array $edits,
    ) {}
}
