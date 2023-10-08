<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

/**
 * @since 3.16.0
 */
final class SemanticTokensLegend
{
    /**
     * @param list<string> $tokenTypes The token types a server uses.
     * @param list<string> $tokenModifiers The token modifiers a server uses.
     */
    public function __construct(
        public readonly array $tokenTypes,
        public readonly array $tokenModifiers,
    ) {}
}
