<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Defines the capabilities provided by a language server.
 */
final class ServerCapabilities
{
    public function __construct(
        public readonly ?PositionEncodingKind $positionEncoding = null,
        public readonly TextDocumentSyncOptions|TextDocumentSyncKind|null $textDocumentSync = null,
        public readonly NotebookDocumentSyncOptions|null $notebookDocumentSync = null,
        public readonly CompletionOptions|null $completionProvider = null,
        public readonly HoverOptions|bool|null $hoverProvider = null,
        public readonly SignatureHelpOptions|null $signatureHelpProvider = null,
        public readonly DeclarationRegistrationOptions|DeclarationOptions|bool|null $declarationProvider = null,
        public readonly DefinitionOptions|bool|null $definitionProvider = null,
        public readonly TypeDefinitionRegistrationOptions|TypeDefinitionOptions|bool|null $typeDefinitionProvider = null,
        public readonly ImplementationRegistrationOptions|ImplementationOptions|bool|null $implementationProvider = null,
        public readonly ReferenceOptions|bool|null $referencesProvider = null,
        public readonly DocumentHighlightOptions|bool|null $documentHighlightProvider = null,
        public readonly DocumentSymbolOptions|bool|null $documentSymbolProvider = null,
        public readonly CodeActionOptions|bool|null $codeActionProvider = null,
        public readonly CodeLensOptions|null $codeLensProvider = null,
        public readonly DocumentLinkOptions|null $documentLinkProvider = null,
        public readonly DocumentColorRegistrationOptions|DocumentColorOptions|bool|null $colorProvider = null,
        public readonly WorkspaceSymbolOptions|bool|null $workspaceSymbolProvider = null,
        public readonly DocumentFormattingOptions|bool|null $documentFormattingProvider = null,
        public readonly DocumentRangeFormattingOptions|bool|null $documentRangeFormattingProvider = null,
        public readonly DocumentOnTypeFormattingOptions|null $documentOnTypeFormattingProvider = null,
        public readonly RenameOptions|bool|null $renameProvider = null,
        public readonly FoldingRangeOptions|FoldingRangeRegistrationOptions|bool|null $foldingRangeProvider = null,
        public readonly SelectionRangeOptions|SelectionRangeRegistrationOptions|bool|null $selectionRangeProvider = null,
        public readonly ExecuteCommandOptions|null $executeCommandProvider = null,
        public readonly CallHierarchyOptions|CallHierarchyRegistrationOptions|bool|null $callHierarchyProvider = null,
        public readonly LinkedEditingRangeOptions|LinkedEditingRangeRegistrationOptions|bool|null $linkedEditingRangeProvider = null,
        public readonly SemanticTokensOptions|SemanticTokensRegistrationOptions|null $semanticTokensProvider = null,
        public readonly MonikerOptions|MonikerRegistrationOptions|bool|null $monikerProvider = null,
        public readonly TypeHierarchyOptions|TypeHierarchyRegistrationOptions|bool|null $typeHierarchyProvider = null,
        public readonly InlineValueOptions|InlineValueRegistrationOptions|bool|null $inlineValueProvider = null,
        public readonly InlayHintOptions|InlayHintRegistrationOptions|bool|null $inlayHintProvider = null,
        public readonly DiagnosticOptions|DiagnosticRegistrationOptions|null $diagnosticProvider = null,
        public readonly WorkspaceServerCapabilities|null $workspace = null,
        public readonly mixed $experimental = null,
    ) {
    }
}
