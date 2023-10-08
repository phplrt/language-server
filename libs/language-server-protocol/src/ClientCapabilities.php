<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\ClientCapabilities\GeneralClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\NotebookDocumentClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocumentClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\WindowClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\WorkspaceClientCapabilities;

/**
 * Defines the capabilities provided by the client.
 */
final class ClientCapabilities
{
    /**
     * @param ?WorkspaceClientCapabilities $workspace Workspace specific client
     *        capabilities.
     * @param ?TextDocumentClientCapabilities $textDocument Text document
     *        specific client capabilities.
     * @param ?NotebookDocumentClientCapabilities $notebookDocument Capabilities
     *        specific to the notebook document support.
     *        - {@since 3.17.0}
     * @param ?WindowClientCapabilities $window Window specific client capabilities.
     * @param ?GeneralClientCapabilities $general General client capabilities.
     *        - {@since 3.16.0}
     * @param mixed $experimental Experimental client capabilities.
     */
    public function __construct(
        public readonly ?WorkspaceClientCapabilities $workspace = null,
        public readonly ?TextDocumentClientCapabilities $textDocument = null,
        public readonly ?NotebookDocumentClientCapabilities $notebookDocument = null,
        public readonly ?WindowClientCapabilities $window = null,
        public readonly ?GeneralClientCapabilities $general = null,
        public readonly mixed $experimental = null,
    ) {}
}
