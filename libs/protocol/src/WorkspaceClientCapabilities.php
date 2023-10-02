<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\Diagnostic\DiagnosticWorkspaceClientCapabilities;
use Phplrt\LanguageServer\Protocol\FileOperation\FileOperationClientCapabilities;
use Phplrt\LanguageServer\Protocol\InlayHint\InlayHintWorkspaceClientCapabilities;
use Phplrt\LanguageServer\Protocol\InlineValue\InlineValueWorkspaceClientCapabilities;
use Phplrt\LanguageServer\Protocol\SemanticTokens\SemanticTokensWorkspaceClientCapabilities;

/**
 * Workspace specific client capabilities.
 */
final class WorkspaceClientCapabilities
{
    /**
     * @param bool|null $applyEdit The client supports applying batch edits to
     *        the workspace by supporting the request 'workspace/applyEdit'.
     * @param WorkspaceEditClientCapabilities|null $workspaceEdit Capabilities
     *        specific to `WorkspaceEdit`s.
     * @param DidChangeConfigurationClientCapabilities|null $didChangeConfiguration
     *        Capabilities specific to the `workspace/didChangeConfiguration`
     *        notification.
     * @param DidChangeWatchedFilesClientCapabilities|null $didChangeWatchedFiles
     *        Capabilities specific to the `workspace/didChangeWatchedFiles`
     *        notification.
     * @param WorkspaceSymbolClientCapabilities|null $symbol Capabilities
     *        specific to the `workspace/symbol` request.
     * @param ExecuteCommandClientCapabilities|null $executeCommand Capabilities
     *        specific to the `workspace/executeCommand` request.
     * @param bool|null $workspaceFolders The client has support for workspace
     *        folders.
     *        - @since 3.6.0
     * @param bool|null $configuration The client supports
     *        `workspace/configuration` requests.
     *        - @since 3.6.0
     * @param SemanticTokensWorkspaceClientCapabilities|null $semanticTokens
     *        Capabilities specific to the semantic token requests scoped to
     *        the workspace.
     *        - @since 3.16.0
     * @param CodeLensWorkspaceClientCapabilities|null $codeLens Capabilities
     *        specific to the code lens requests scoped to the workspace.
     *        - @since 3.16.0
     * @param FileOperationClientCapabilities|null $fileOperations The client
     *        has support for file notifications/requests for user operations
     *        on files.
     *        - @since 3.16.0
     * @param InlineValueWorkspaceClientCapabilities|null $inlineValue
     *        Capabilities specific to the inline values requests scoped to the
     *        workspace.
     *        - @since 3.17.0
     * @param InlayHintWorkspaceClientCapabilities|null $inlayHint Capabilities
     *        specific to the inlay hint requests scoped to the workspace.
     *        - @since 3.17.0
     * @param DiagnosticWorkspaceClientCapabilities|null $diagnostics
     *        Capabilities specific to the diagnostic requests scoped to the
     *        workspace.
     *        - @since 3.17.0
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
    ) {}
}
