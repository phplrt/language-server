<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

final class SemanticTokensClientCapabilitiesRequests
{
    /**
     * @param bool|object|null $range The client will send the
     *        `textDocument/semanticTokens/range` request if the server provides a
     *        corresponding handler.
     * @param SemanticTokensClientCapabilitiesRequestsFull|null $full The client
     *        will send the `textDocument/semanticTokens/full` request if the server
     *        provides a corresponding handler.
     *        TODO This field MAY also contain boolean type, but the cuyz/valinor
     *             contains an error due to which a mapping error may occur when
     *             specifying this type.
     */
    public function __construct(
        public readonly bool|object|null $range = null,
        public readonly SemanticTokensClientCapabilitiesRequestsFull|null $full = null,
    ) {}
}
