<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

final class SemanticTokensOptionsFull
{
    /**
     * @param ?bool $delta The server supports deltas for full documents.
     */
    public function __construct(
        public readonly ?bool $delta = null,
    ) {}
}
