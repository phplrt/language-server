<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

/**
 * @since 3.16.0
 */
final class SemanticTokens
{
    /**
     * @param ?string $resultId An optional result id. If provided and
     *        clients support delta updating the client will include the result id in
     *        the next semantic token request. A server can then instead of computing
     *        all semantic tokens again simply send a delta.
     * @param list<int<0, 2147483647>> $data The actual tokens.
     */
    public function __construct(
        public readonly ?string $resultId = null,
        public readonly array $data = [],
    ) {}
}
