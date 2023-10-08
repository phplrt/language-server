<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\Completion;

use Phplrt\LanguageServer\Protocol\Type\MarkupKind;

final class CompletionItem
{
    /**
     * @param ?bool $snippetSupport Client supports snippets as insert text.
     *         A snippet can define tab stops and placeholders with `$1`, `$2` and
     *        `${3:foo}`. `$0` defines the final tab stop, it defaults to the end of
     *        the snippet. Placeholders with equal identifiers are linked, that is
     *        typing in one will update others too.
     * @param ?bool $commitCharactersSupport Client supports commit characters on a
     *        completion item.
     * @param ?list<MarkupKind> $documentationFormat Client supports the following
     *        content formats for the documentation property. The order describes the
     *        preferred format of the client.
     * @param ?bool $deprecatedSupport Client supports the deprecated property on a
     *        completion item.
     * @param ?bool $preselectSupport Client supports the preselect property on a
     *        completion item.
     * @param ?CompletionItemTagSupport $tagSupport Client supports the tag
     *        property on a completion item. Clients supporting tags have to
     *        handle unknown tags gracefully. Clients especially need to
     *        preserve unknown tags when sending a completion item back to the
     *        server in a resolve call.
     *        - {@since 3.15.0}
     * @param ?bool $insertReplaceSupport Client support insert replace edit to control
     *        different behavior if a completion item is inserted in the text or should
     *        replace text.
     *        - {@since 3.16.0}
     * @param ?CompletionItemResolveSupport $resolveSupport Indicates which
     *        properties a client can resolve lazily on a completion item.
     *        Before version 3.16.0 only the predefined properties
     *        `documentation` and `details` could be resolved lazily.
     *        - {@since 3.16.0}
     * @param ?CompletionItemInsertTextModeSupport $insertTextModeSupport
     *        The client supports the {@see $insertTextMode} property on a completion item to
     *        override the whitespace handling mode as defined by the client (see
     *        {@see $insertTextMode}).
     *        - {@since 3.16.0}
     * @param ?bool $labelDetailsSupport The client has support for completion item
     *        label details (see also `CompletionItemLabelDetails`).
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly ?bool $snippetSupport = null,
        public readonly ?bool $commitCharactersSupport = null,
        public readonly ?array $documentationFormat = null,
        public readonly ?bool $deprecatedSupport = null,
        public readonly ?bool $preselectSupport = null,
        public readonly ?CompletionItemTagSupport $tagSupport = null,
        public readonly ?bool $insertReplaceSupport = null,
        public readonly ?CompletionItemResolveSupport $resolveSupport = null,
        public readonly ?CompletionItemInsertTextModeSupport $insertTextModeSupport = null,
        public readonly ?bool $labelDetailsSupport = null,
    ) {}
}
