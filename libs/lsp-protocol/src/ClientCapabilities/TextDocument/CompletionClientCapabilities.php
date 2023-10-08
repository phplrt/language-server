<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument;

use Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\Completion\CompletionItem;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\Completion\CompletionItemKindValueSet;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\Completion\CompletionList;
use Phplrt\LanguageServer\Protocol\Type\InsertTextMode;

/**
 * Completion client capabilities
 */
final class CompletionClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether completion supports dynamic
     *        registration.
     * @param ?CompletionItem $completionItem The client
     *        supports the following `CompletionItem` specific capabilities.
     * @param ?CompletionItemKindValueSet $completionItemKind
     * @param ?InsertTextMode $insertTextMode Defines how the client handles
     *        whitespace and indentation when accepting a completion item that
     *        uses multi line text in either `insertText` or `textEdit`.
     *        - {@since 3.17.0}
     * @param ?bool $contextSupport The client supports to send additional
     *        context information for a `textDocument/completion` request.
     * @param ?CompletionList $completionList The client supports the following
     *        `CompletionList` specific capabilities.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?CompletionItem $completionItem = null,
        public readonly ?CompletionItemKindValueSet $completionItemKind = null,
        public readonly ?InsertTextMode $insertTextMode = null,
        public readonly ?bool $contextSupport = null,
        public readonly ?CompletionList $completionList = null,
    ) {}
}
