<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities;

use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\CodeLensWorkspaceClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\DidChangeConfigurationClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\DidChangeWatchedFilesClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\ExecuteCommandClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\FoldingRangeWorkspaceClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceEditClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceSymbolClientCapabilities;
use Phplrt\LanguageServer\Protocol\Diagnostic\DiagnosticWorkspaceClientCapabilities;
use Phplrt\LanguageServer\Protocol\FileOperations\FileOperationClientCapabilities;
use Phplrt\LanguageServer\Protocol\InlayHint\InlayHintWorkspaceClientCapabilities;
use Phplrt\LanguageServer\Protocol\InlineValue\InlineValueWorkspaceClientCapabilities;
use Phplrt\LanguageServer\Protocol\SemanticTokens\SemanticTokensWorkspaceClientCapabilities;
use Phplrt\LanguageServer\Protocol\Type\WorkspaceEdit;

/**
 * Workspace specific client capabilities.
 */
final class WorkspaceClientCapabilities
{
    /**
     * @param ?bool $applyEdit The client supports applying batch edits to the
     *        workspace by supporting the request 'workspace/applyEdit'
     * @param ?WorkspaceEditClientCapabilities $workspaceEdit Capabilities
     *        specific to {@see WorkspaceEdit}s.
     * @param ?DidChangeConfigurationClientCapabilities $didChangeConfiguration
     *        Capabilities specific to the `workspace/didChangeConfiguration`
     *        notification.
     * @param ?DidChangeWatchedFilesClientCapabilities $didChangeWatchedFiles
     *        Capabilities specific to the `workspace/didChangeWatchedFiles`
     *        notification.
     * @param ?WorkspaceSymbolClientCapabilities $symbol Capabilities specific
     *        to the `workspace/symbol` request.
     * @param ?ExecuteCommandClientCapabilities $executeCommand Capabilities
     *        specific to the `workspace/executeCommand` request.
     * @param ?bool $workspaceFolders The client has support for workspace folders.
     *        - {@since 3.6.0}
     * @param ?bool $configuration The client supports `workspace/configuration`
     *        requests.
     *        - {@since 3.6.0}
     * @param ?SemanticTokensWorkspaceClientCapabilities $semanticTokens
     *        Capabilities specific to the semantic token requests scoped to the
     *        workspace.
     *        - {@since 3.16.0}
     * @param ?CodeLensWorkspaceClientCapabilities $codeLens Capabilities
     *        specific to the code lens requests scoped to the workspace.
     *        - {@since 3.16.0}
     * @param ?FileOperationClientCapabilities $fileOperations The client has
     *        support for file notifications/requests for user operations on
     *        files.
     *        - {@since 3.16.0}
     * @param ?InlineValueWorkspaceClientCapabilities $inlineValue Capabilities
     *        specific to the inline values requests scoped to the workspace.
     *        - {@since 3.17.0}
     * @param ?InlayHintWorkspaceClientCapabilities $inlayHint Capabilities
     *        specific to the inlay hint requests scoped to the workspace.
     *        - {@since 3.17.0}
     * @param ?DiagnosticWorkspaceClientCapabilities $diagnostics Capabilities
     *        specific to the diagnostic requests scoped to the workspace.
     *        - {@since 3.17.0}
     * @param ?FoldingRangeWorkspaceClientCapabilities $foldingRange Capabilities
     *        specific to the folding range requests scoped to the workspace.
     *        - {@since 3.18.0}
     */
    public function __construct(
        public readonly ?bool $applyEdit = null,
        public readonly ?WorkspaceEditClientCapabilities $workspaceEdit = null,
        public readonly ?DidChangeConfigurationClientCapabilities $didChangeConfiguration = null,
        public readonly ?DidChangeWatchedFilesClientCapabilities $didChangeWatchedFiles = null,
        public readonly ?WorkspaceSymbolClientCapabilities $symbol = null,
        public readonly ?ExecuteCommandClientCapabilities $executeCommand = null,
        public readonly ?bool $workspaceFolders = null,
        public readonly ?bool $configuration = null,
        public readonly ?SemanticTokensWorkspaceClientCapabilities $semanticTokens = null,
        public readonly ?CodeLensWorkspaceClientCapabilities $codeLens = null,
        public readonly ?FileOperationClientCapabilities $fileOperations = null,
        public readonly ?InlineValueWorkspaceClientCapabilities $inlineValue = null,
        public readonly ?InlayHintWorkspaceClientCapabilities $inlayHint = null,
        public readonly ?DiagnosticWorkspaceClientCapabilities $diagnostics = null,
        public readonly ?FoldingRangeWorkspaceClientCapabilities $foldingRange = null,
    ) {}
}
