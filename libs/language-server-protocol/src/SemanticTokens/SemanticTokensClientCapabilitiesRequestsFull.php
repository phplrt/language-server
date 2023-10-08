<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

final class SemanticTokensClientCapabilitiesRequestsFull
{
    /**
     * @param ?bool $delta The client will send the
     *        `textDocument/semanticTokens/full/delta` request if the server
     *        provides a corresponding handler.
     */
    public function __construct(
        public readonly ?bool $delta = null,
    ) {}
}
