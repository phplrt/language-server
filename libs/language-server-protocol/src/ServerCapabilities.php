<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\InlayHint\InlayHintOptions;
use Phplrt\LanguageServer\Protocol\InlayHint\InlayHintRegistrationOptions;
use Phplrt\LanguageServer\Protocol\InlineValue\InlineValueOptions;
use Phplrt\LanguageServer\Protocol\InlineValue\InlineValueRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Notebook\NotebookDocumentSyncOptions;
use Phplrt\LanguageServer\Protocol\Notebook\NotebookDocumentSyncRegistrationOptions;
use Phplrt\LanguageServer\Protocol\SemanticTokens\SemanticTokensOptions;
use Phplrt\LanguageServer\Protocol\SemanticTokens\SemanticTokensRegistrationOptions;
use Phplrt\LanguageServer\Protocol\CallHierarchy\CallHierarchyOptions;
use Phplrt\LanguageServer\Protocol\CallHierarchy\CallHierarchyRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Experimental\CodeActionOptions;
use Phplrt\LanguageServer\Protocol\CodeLens\CodeLensOptions;
use Phplrt\LanguageServer\Protocol\Experimental\CompletionOptions;
use Phplrt\LanguageServer\Protocol\Declaration\DeclarationOptions;
use Phplrt\LanguageServer\Protocol\Declaration\DeclarationRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Experimental\DefinitionOptions;
use Phplrt\LanguageServer\Protocol\Diagnostic\DiagnosticOptions;
use Phplrt\LanguageServer\Protocol\Diagnostic\DiagnosticRegistrationOptions;
use Phplrt\LanguageServer\Protocol\ColorProvider\DocumentColorOptions;
use Phplrt\LanguageServer\Protocol\ColorProvider\DocumentColorRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Experimental\DocumentFormattingOptions;
use Phplrt\LanguageServer\Protocol\Experimental\DocumentHighlightOptions;
use Phplrt\LanguageServer\Protocol\Experimental\DocumentLinkOptions;
use Phplrt\LanguageServer\Protocol\Experimental\DocumentOnTypeFormattingOptions;
use Phplrt\LanguageServer\Protocol\Experimental\DocumentRangeFormattingOptions;
use Phplrt\LanguageServer\Protocol\Experimental\DocumentSymbolOptions;
use Phplrt\LanguageServer\Protocol\Experimental\ExecuteCommandOptions;
use Phplrt\LanguageServer\Protocol\FoldingRange\FoldingRangeOptions;
use Phplrt\LanguageServer\Protocol\FoldingRange\FoldingRangeRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Experimental\HoverOptions;
use Phplrt\LanguageServer\Protocol\Implementation\ImplementationOptions;
use Phplrt\LanguageServer\Protocol\Implementation\ImplementationRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Experimental\InlineCompletionOptions;
use Phplrt\LanguageServer\Protocol\LinkedEditingRange\LinkedEditingRangeOptions;
use Phplrt\LanguageServer\Protocol\LinkedEditingRange\LinkedEditingRangeRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Moniker\MonikerOptions;
use Phplrt\LanguageServer\Protocol\Moniker\MonikerRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Experimental\ReferenceOptions;
use Phplrt\LanguageServer\Protocol\Experimental\RenameOptions;
use Phplrt\LanguageServer\Protocol\SelectionRange\SelectionRangeOptions;
use Phplrt\LanguageServer\Protocol\SelectionRange\SelectionRangeRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Experimental\ServerCapabilitiesWorkspace;
use Phplrt\LanguageServer\Protocol\Experimental\SignatureHelpOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentSyncKind;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentSyncOptions;
use Phplrt\LanguageServer\Protocol\TypeDefinition\TypeDefinitionOptions;
use Phplrt\LanguageServer\Protocol\TypeDefinition\TypeDefinitionRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TypeHierarchy\TypeHierarchyOptions;
use Phplrt\LanguageServer\Protocol\TypeHierarchy\TypeHierarchyRegistrationOptions;
use Phplrt\LanguageServer\Protocol\Experimental\WorkspaceSymbolOptions;

/**
 * Defines the capabilities provided by a language server.
 */
final class ServerCapabilities
{
    /**
     * @param PositionEncodingKind|string|null $positionEncoding The position
     *        encoding the server picked from the encodings offered by the client via
     *        the client capability `general.positionEncodings`.
     *         If the client didn't provide any position encodings the only valid value
     *        that a server can return is 'utf-16'.
     *         If omitted it defaults to 'utf-16'.
     *        - {@since 3.17.0}
     * @param TextDocumentSyncOptions|TextDocumentSyncKind|null $textDocumentSync
     *        Defines how text documents are synced. Is either a detailed structure
     *        defining each notification or for backwards compatibility the
     *        TextDocumentSyncKind number.
     * @param NotebookDocumentSyncOptions|NotebookDocumentSyncRegistrationOptions|null $notebookDocumentSync
     *        Defines how notebook documents are synced.
     *        - {@since 3.17.0}
     * @param ?CompletionOptions $completionProvider The server provides completion
     *        support.
     * @param bool|HoverOptions|null $hoverProvider The server provides hover support.
     * @param ?SignatureHelpOptions $signatureHelpProvider The server provides
     *        signature help support.
     * @param bool|DeclarationOptions|DeclarationRegistrationOptions|null $declarationProvider
     *        The server provides Goto Declaration support.
     * @param bool|DefinitionOptions|null $definitionProvider The server provides goto
     *        definition support.
     * @param bool|TypeDefinitionOptions|TypeDefinitionRegistrationOptions|null $typeDefinitionProvider
     *        The server provides Goto Type Definition support.
     * @param bool|ImplementationOptions|ImplementationRegistrationOptions|null $implementationProvider
     *        The server provides Goto Implementation support.
     * @param bool|ReferenceOptions|null $referencesProvider The server provides find
     *        references support.
     * @param bool|DocumentHighlightOptions|null $documentHighlightProvider The server
     *        provides document highlight support.
     * @param bool|DocumentSymbolOptions|null $documentSymbolProvider The server
     *        provides document symbol support.
     * @param bool|CodeActionOptions|null $codeActionProvider The server provides code
     *        actions. CodeActionOptions may only be specified if the client states
     *        that it supports
     *        {@see $codeActionLiteralSupport} in its initial {@see $initialize} request.
     * @param ?CodeLensOptions $codeLensProvider The server provides code lens.
     * @param ?DocumentLinkOptions $documentLinkProvider The server provides document
     *        link support.
     * @param bool|DocumentColorOptions|DocumentColorRegistrationOptions|null $colorProvider
     *        The server provides color provider support.
     * @param bool|WorkspaceSymbolOptions|null $workspaceSymbolProvider The server
     *        provides workspace symbol support.
     * @param bool|DocumentFormattingOptions|null $documentFormattingProvider The
     *        server provides document formatting.
     * @param bool|DocumentRangeFormattingOptions|null $documentRangeFormattingProvider
     *        The server provides document range formatting.
     * @param ?DocumentOnTypeFormattingOptions $documentOnTypeFormattingProvider
     *        The server provides document formatting on typing.
     * @param bool|RenameOptions|null $renameProvider The server provides rename
     *        support. RenameOptions may only be specified if the client states that it
     *        supports
     *        {@see $prepareSupport} in its initial {@see $initialize} request.
     * @param bool|FoldingRangeOptions|FoldingRangeRegistrationOptions|null $foldingRangeProvider
     *        The server provides folding provider support.
     * @param bool|SelectionRangeOptions|SelectionRangeRegistrationOptions|null $selectionRangeProvider
     *        The server provides selection range support.
     * @param ?ExecuteCommandOptions $executeCommandProvider The server provides
     *        execute command support.
     * @param bool|CallHierarchyOptions|CallHierarchyRegistrationOptions|null $callHierarchyProvider
     *        The server provides call hierarchy support.
     *        - {@since 3.16.0}
     * @param bool|LinkedEditingRangeOptions|LinkedEditingRangeRegistrationOptions|null $linkedEditingRangeProvider
     *        The server provides linked editing range support.
     *        - {@since 3.16.0}
     * @param SemanticTokensOptions|SemanticTokensRegistrationOptions|null $semanticTokensProvider
     *        The server provides semantic tokens support.
     *        - {@since 3.16.0}
     * @param bool|MonikerOptions|MonikerRegistrationOptions|null $monikerProvider
     *        The server provides moniker support.
     *        - {@since 3.16.0}
     * @param bool|TypeHierarchyOptions|TypeHierarchyRegistrationOptions|null $typeHierarchyProvider
     *        The server provides type hierarchy support.
     *        - {@since 3.17.0}
     * @param bool|InlineValueOptions|InlineValueRegistrationOptions|null $inlineValueProvider
     *        The server provides inline values.
     *        - {@since 3.17.0}
     * @param bool|InlayHintOptions|InlayHintRegistrationOptions|null $inlayHintProvider
     *        The server provides inlay hints.
     *        - {@since 3.17.0}
     * @param DiagnosticOptions|DiagnosticRegistrationOptions|null $diagnosticProvider
     *        The server has support for pull model diagnostics.
     *        - {@since 3.17.0}
     * @param bool|InlineCompletionOptions|null $inlineCompletionProvider Inline
     *        completion options used during static registration.
     *        - {@since 3.18.0}
     * @param ?ServerCapabilitiesWorkspace $workspace Workspace specific server
     *        capabilities.
     * @param mixed $experimental Experimental server capabilities.
     */
    public function __construct(
        public readonly PositionEncodingKind|string|null $positionEncoding = null,
        public readonly TextDocumentSyncOptions|TextDocumentSyncKind|null $textDocumentSync = null,
        public readonly NotebookDocumentSyncOptions|NotebookDocumentSyncRegistrationOptions|null $notebookDocumentSync = null,
        public readonly ?CompletionOptions $completionProvider = null,
        public readonly bool|HoverOptions|null $hoverProvider = null,
        public readonly ?SignatureHelpOptions $signatureHelpProvider = null,
        public readonly bool|DeclarationOptions|DeclarationRegistrationOptions|null $declarationProvider = null,
        public readonly bool|DefinitionOptions|null $definitionProvider = null,
        public readonly bool|TypeDefinitionOptions|TypeDefinitionRegistrationOptions|null $typeDefinitionProvider = null,
        public readonly bool|ImplementationOptions|ImplementationRegistrationOptions|null $implementationProvider = null,
        public readonly bool|ReferenceOptions|null $referencesProvider = null,
        public readonly bool|DocumentHighlightOptions|null $documentHighlightProvider = null,
        public readonly bool|DocumentSymbolOptions|null $documentSymbolProvider = null,
        public readonly bool|CodeActionOptions|null $codeActionProvider = null,
        public readonly ?CodeLensOptions $codeLensProvider = null,
        public readonly ?DocumentLinkOptions $documentLinkProvider = null,
        public readonly bool|DocumentColorOptions|DocumentColorRegistrationOptions|null $colorProvider = null,
        public readonly bool|WorkspaceSymbolOptions|null $workspaceSymbolProvider = null,
        public readonly bool|DocumentFormattingOptions|null $documentFormattingProvider = null,
        public readonly bool|DocumentRangeFormattingOptions|null $documentRangeFormattingProvider = null,
        public readonly ?DocumentOnTypeFormattingOptions $documentOnTypeFormattingProvider = null,
        public readonly bool|RenameOptions|null $renameProvider = null,
        public readonly bool|FoldingRangeOptions|FoldingRangeRegistrationOptions|null $foldingRangeProvider = null,
        public readonly bool|SelectionRangeOptions|SelectionRangeRegistrationOptions|null $selectionRangeProvider = null,
        public readonly ?ExecuteCommandOptions $executeCommandProvider = null,
        public readonly bool|CallHierarchyOptions|CallHierarchyRegistrationOptions|null $callHierarchyProvider = null,
        public readonly bool|LinkedEditingRangeOptions|LinkedEditingRangeRegistrationOptions|null $linkedEditingRangeProvider = null,
        public readonly SemanticTokensOptions|SemanticTokensRegistrationOptions|null $semanticTokensProvider = null,
        public readonly bool|MonikerOptions|MonikerRegistrationOptions|null $monikerProvider = null,
        public readonly bool|TypeHierarchyOptions|TypeHierarchyRegistrationOptions|null $typeHierarchyProvider = null,
        public readonly bool|InlineValueOptions|InlineValueRegistrationOptions|null $inlineValueProvider = null,
        public readonly bool|InlayHintOptions|InlayHintRegistrationOptions|null $inlayHintProvider = null,
        public readonly DiagnosticOptions|DiagnosticRegistrationOptions|null $diagnosticProvider = null,
        public readonly bool|InlineCompletionOptions|null $inlineCompletionProvider = null,
        public readonly ?ServerCapabilitiesWorkspace $workspace = null,
        public readonly mixed $experimental = null,
    ) {}
}
