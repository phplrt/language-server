<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\CallHierarchy\CallHierarchyOptions;
use Phplrt\LanguageServer\Protocol\CallHierarchy\CallHierarchyRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Declaration\DeclarationOptions;
use Phplrt\LanguageServer\Protocol\Declaration\DeclarationRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Diagnostic\DiagnosticOptions;
use Phplrt\LanguageServer\Protocol\Diagnostic\DiagnosticRegistrationOptions;
use Phplrt\LanguageServer\Protocol\FoldingRange\FoldingRangeOptions;
use Phplrt\LanguageServer\Protocol\FoldingRange\FoldingRangeRegistrationOptions;
use Phplrt\LanguageServer\Protocol\InlayHint\InlayHintOptions;
use Phplrt\LanguageServer\Protocol\InlayHint\InlayHintRegistrationOptions;
use Phplrt\LanguageServer\Protocol\InlineValue\InlineValueOptions;
use Phplrt\LanguageServer\Protocol\InlineValue\InlineValueRegistrationOptions;
use Phplrt\LanguageServer\Protocol\LinkedEditingRange\LinkedEditingRangeOptions;
use Phplrt\LanguageServer\Protocol\LinkedEditingRange\LinkedEditingRangeRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Moniker\MonikerOptions;
use Phplrt\LanguageServer\Protocol\Moniker\MonikerRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Notebook\NotebookDocumentSyncOptions;
use Phplrt\LanguageServer\Protocol\SelectionRange\SelectionRangeOptions;
use Phplrt\LanguageServer\Protocol\SelectionRange\SelectionRangeRegistrationOptions;
use Phplrt\LanguageServer\Protocol\SemanticTokens\SemanticTokensOptions;
use Phplrt\LanguageServer\Protocol\SemanticTokens\SemanticTokensRegistrationOptions;

/**
 * Defines the capabilities provided by a language server.
 */
final class ServerCapabilities
{
    public function __construct(
        public readonly ?PositionEncodingKindInterface $positionEncoding = null,
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
        public readonly FoldingRangeRegistrationOptions|FoldingRangeOptions|bool|null $foldingRangeProvider = null,
        public readonly SelectionRangeRegistrationOptions|SelectionRangeOptions|bool|null $selectionRangeProvider = null,
        public readonly ExecuteCommandOptions|null $executeCommandProvider = null,
        public readonly CallHierarchyRegistrationOptions|CallHierarchyOptions|bool|null $callHierarchyProvider = null,
        public readonly LinkedEditingRangeRegistrationOptions|LinkedEditingRangeOptions|bool|null $linkedEditingRangeProvider = null,
        public readonly SemanticTokensRegistrationOptions|SemanticTokensOptions|null $semanticTokensProvider = null,
        public readonly MonikerRegistrationOptions|MonikerOptions|bool|null $monikerProvider = null,
        public readonly TypeHierarchyRegistrationOptions|TypeHierarchyOptions|bool|null $typeHierarchyProvider = null,
        public readonly InlineValueRegistrationOptions|InlineValueOptions|bool|null $inlineValueProvider = null,
        public readonly InlayHintRegistrationOptions|InlayHintOptions|bool|null $inlayHintProvider = null,
        public readonly DiagnosticRegistrationOptions|DiagnosticOptions|null $diagnosticProvider = null,
        public readonly WorkspaceServerCapabilities|null $workspace = null,
        public readonly mixed $experimental = null,
    ) {}
}
