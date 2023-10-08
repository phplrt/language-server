<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

/**
 * @since 3.16.0
 */
final class SemanticTokensDelta
{
    /**
     * @param ?string $resultId
     * @param list<SemanticTokensEdit> $edits The semantic token edits to
     *        transform a previous result into a new result.
     */
    public function __construct(
        public readonly ?string $resultId = null,
        public readonly array $edits = [],
    ) {}
}
