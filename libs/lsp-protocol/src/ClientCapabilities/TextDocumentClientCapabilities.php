<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities;

use Phplrt\LanguageServer\Protocol\CallHierarchy\CallHierarchyClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\CodeActionClientCapabilities;
use Phplrt\LanguageServer\Protocol\CodeLens\CodeLensClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\CompletionClientCapabilities;
use Phplrt\LanguageServer\Protocol\Declaration\DeclarationClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\DefinitionClientCapabilities;
use Phplrt\LanguageServer\Protocol\Diagnostic\DiagnosticClientCapabilities;
use Phplrt\LanguageServer\Protocol\ColorProvider\DocumentColorClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\DocumentFormattingClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\DocumentHighlightClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\DocumentLinkClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\DocumentOnTypeFormattingClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\DocumentRangeFormattingClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\DocumentSymbolClientCapabilities;
use Phplrt\LanguageServer\Protocol\FoldingRange\FoldingRangeClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\HoverClientCapabilities;
use Phplrt\LanguageServer\Protocol\Implementation\ImplementationClientCapabilities;
use Phplrt\LanguageServer\Protocol\InlayHint\InlayHintClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\InlineCompletionClientCapabilities;
use Phplrt\LanguageServer\Protocol\InlineValue\InlineValueClientCapabilities;
use Phplrt\LanguageServer\Protocol\LinkedEditingRange\LinkedEditingRangeClientCapabilities;
use Phplrt\LanguageServer\Protocol\Moniker\MonikerClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\PublishDiagnosticsClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\ReferenceClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\RenameClientCapabilities;
use Phplrt\LanguageServer\Protocol\SelectionRange\SelectionRangeClientCapabilities;
use Phplrt\LanguageServer\Protocol\SemanticTokens\SemanticTokensClientCapabilities;
use Phplrt\LanguageServer\Protocol\Unstable\SignatureHelpClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\TextDocumentSyncClientCapabilities;
use Phplrt\LanguageServer\Protocol\TypeDefinition\TypeDefinitionClientCapabilities;
use Phplrt\LanguageServer\Protocol\TypeHierarchy\TypeHierarchyClientCapabilities;

/**
 * Text document specific client capabilities.
 */
final class TextDocumentClientCapabilities
{
    /**
     * @param ?TextDocumentSyncClientCapabilities $synchronization Defines which
     *        synchronization capabilities the client supports.
     * @param ?CompletionClientCapabilities $completion Capabilities specific to the
     *        `textDocument/completion` request.
     * @param ?HoverClientCapabilities $hover Capabilities specific to the
     *        `textDocument/hover` request.
     * @param ?SignatureHelpClientCapabilities $signatureHelp Capabilities specific to
     *        the `textDocument/signatureHelp` request.
     * @param ?DeclarationClientCapabilities $declaration Capabilities specific to the
     *        `textDocument/declaration` request.
     *        - {@since 3.14.0}
     * @param ?DefinitionClientCapabilities $definition Capabilities specific to the
     *        `textDocument/definition` request.
     * @param ?TypeDefinitionClientCapabilities $typeDefinition Capabilities specific
     *        to the `textDocument/typeDefinition` request.
     *        - {@since 3.6.0}
     * @param ?ImplementationClientCapabilities $implementation Capabilities specific
     *        to the `textDocument/implementation` request.
     *        - {@since 3.6.0}
     * @param ?ReferenceClientCapabilities $references Capabilities specific to the
     *        `textDocument/references` request.
     * @param ?DocumentHighlightClientCapabilities $documentHighlight Capabilities
     *        specific to the `textDocument/documentHighlight` request.
     * @param ?DocumentSymbolClientCapabilities $documentSymbol Capabilities specific
     *        to the `textDocument/documentSymbol` request.
     * @param ?CodeActionClientCapabilities $codeAction Capabilities specific to the
     *        `textDocument/codeAction` request.
     * @param ?CodeLensClientCapabilities $codeLens Capabilities specific to the
     *        `textDocument/codeLens` request.
     * @param ?DocumentLinkClientCapabilities $documentLink Capabilities specific to
     *        the `textDocument/documentLink` request.
     * @param ?DocumentColorClientCapabilities $colorProvider Capabilities specific to
     *        the `textDocument/documentColor` and the
     *        `textDocument/colorPresentation` request.
     *        - {@since 3.6.0}
     * @param ?DocumentFormattingClientCapabilities $formatting Capabilities specific
     *        to the `textDocument/formatting` request.
     * @param ?DocumentRangeFormattingClientCapabilities $rangeFormatting Capabilities
     *        specific to the `textDocument/rangeFormatting` request.
     * @param ?DocumentOnTypeFormattingClientCapabilities $onTypeFormatting
     *        Capabilities specific to the `textDocument/onTypeFormatting` request.
     * @param ?RenameClientCapabilities $rename Capabilities specific to the
     *        `textDocument/rename` request.
     * @param ?FoldingRangeClientCapabilities $foldingRange Capabilities specific to
     *        the `textDocument/foldingRange` request.
     *        - {@since 3.10.0}
     * @param ?SelectionRangeClientCapabilities $selectionRange Capabilities specific
     *        to the `textDocument/selectionRange` request.
     *        - {@since 3.15.0}
     * @param ?PublishDiagnosticsClientCapabilities $publishDiagnostics Capabilities
     *        specific to the `textDocument/publishDiagnostics` notification.
     * @param ?CallHierarchyClientCapabilities $callHierarchy Capabilities specific to
     *        the various call hierarchy requests.
     *        - {@since 3.16.0}
     * @param ?SemanticTokensClientCapabilities $semanticTokens Capabilities specific
     *        to the various semantic token request.
     *        - {@since 3.16.0}
     * @param ?LinkedEditingRangeClientCapabilities $linkedEditingRange Capabilities
     *        specific to the `textDocument/linkedEditingRange` request.
     *        - {@since 3.16.0}
     * @param ?MonikerClientCapabilities $moniker Client capabilities specific to the
     *        `textDocument/moniker` request.
     *        - {@since 3.16.0}
     * @param ?TypeHierarchyClientCapabilities $typeHierarchy Capabilities specific to
     *        the various type hierarchy requests.
     *        - {@since 3.17.0}
     * @param ?InlineValueClientCapabilities $inlineValue Capabilities specific to the
     *        `textDocument/inlineValue` request.
     *        - {@since 3.17.0}
     * @param ?InlayHintClientCapabilities $inlayHint Capabilities specific to the
     *        `textDocument/inlayHint` request.
     *        - {@since 3.17.0}
     * @param ?DiagnosticClientCapabilities $diagnostic Capabilities specific to the
     *        diagnostic pull model.
     *        - {@since 3.17.0}
     * @param ?InlineCompletionClientCapabilities $inlineCompletion Client capabilities
     *        specific to inline completions.
     *        - {@since 3.18.0}
     */
    public function __construct(
        public readonly ?TextDocumentSyncClientCapabilities $synchronization = null,
        public readonly ?CompletionClientCapabilities $completion = null,
        public readonly ?HoverClientCapabilities $hover = null,
        public readonly ?SignatureHelpClientCapabilities $signatureHelp = null,
        public readonly ?DeclarationClientCapabilities $declaration = null,
        public readonly ?DefinitionClientCapabilities $definition = null,
        public readonly ?TypeDefinitionClientCapabilities $typeDefinition = null,
        public readonly ?ImplementationClientCapabilities $implementation = null,
        public readonly ?ReferenceClientCapabilities $references = null,
        public readonly ?DocumentHighlightClientCapabilities $documentHighlight = null,
        public readonly ?DocumentSymbolClientCapabilities $documentSymbol = null,
        public readonly ?CodeActionClientCapabilities $codeAction = null,
        public readonly ?CodeLensClientCapabilities $codeLens = null,
        public readonly ?DocumentLinkClientCapabilities $documentLink = null,
        public readonly ?DocumentColorClientCapabilities $colorProvider = null,
        public readonly ?DocumentFormattingClientCapabilities $formatting = null,
        public readonly ?DocumentRangeFormattingClientCapabilities $rangeFormatting = null,
        public readonly ?DocumentOnTypeFormattingClientCapabilities $onTypeFormatting = null,
        public readonly ?RenameClientCapabilities $rename = null,
        public readonly ?FoldingRangeClientCapabilities $foldingRange = null,
        public readonly ?SelectionRangeClientCapabilities $selectionRange = null,
        public readonly ?PublishDiagnosticsClientCapabilities $publishDiagnostics = null,
        public readonly ?CallHierarchyClientCapabilities $callHierarchy = null,
        public readonly ?SemanticTokensClientCapabilities $semanticTokens = null,
        public readonly ?LinkedEditingRangeClientCapabilities $linkedEditingRange = null,
        public readonly ?MonikerClientCapabilities $moniker = null,
        public readonly ?TypeHierarchyClientCapabilities $typeHierarchy = null,
        public readonly ?InlineValueClientCapabilities $inlineValue = null,
        public readonly ?InlayHintClientCapabilities $inlayHint = null,
        public readonly ?DiagnosticClientCapabilities $diagnostic = null,
        public readonly ?InlineCompletionClientCapabilities $inlineCompletion = null,
    ) {}
}
