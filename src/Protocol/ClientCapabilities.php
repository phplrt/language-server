<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Defines the capabilities provided by the client.
 */
final class ClientCapabilities
{
    /**
     * @param WorkspaceClientCapabilities|null $workspace Workspace specific
     *        client capabilities.
     * @param TextDocumentClientCapabilities|null $textDocument Text document
     *        specific client capabilities.
     * @param NotebookDocumentClientCapabilities|null $notebookDocument
     *        Capabilities specific to the notebook document support.
     *        @since 3.17.0
     * @param WindowClientCapabilities|null $window Window specific client
     *        capabilities.
     * @param GeneralClientCapabilities|null $general General client
     *        capabilities.
     *        @since 3.16.0
     * @param mixed|null $experimental Experimental client capabilities.
     */
    public function __construct(
        public readonly ?WorkspaceClientCapabilities $workspace = null,
        public readonly ?TextDocumentClientCapabilities $textDocument = null,
        public readonly ?NotebookDocumentClientCapabilities $notebookDocument = null,
        public readonly ?WindowClientCapabilities $window = null,
        public readonly ?GeneralClientCapabilities $general = null,
        public readonly mixed $experimental = null,
    ) {
    }
}
