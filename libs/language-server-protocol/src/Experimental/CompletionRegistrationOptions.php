<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptionsProvider;

/**
 * Registration options for a {@link CompletionRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class CompletionRegistrationOptions extends CompletionOptions implements
    TextDocumentRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;

    /**
     * @param ?list<string> $triggerCharacters Most tools trigger completion
     *        request automatically without explicitly requesting it using a keyboard
     *        shortcut (e.g. Ctrl+Space). Typically they do so when the user starts to
     *        type an identifier. For example if the user types `c` in a JavaScript
     *        file code complete will automatically pop up present {@see $console} besides
     *        others as a completion item. Characters that make up identifiers don't
     *        need to be listed here.
     *         If code complete should automatically be trigger on characters not being
     *        valid inside an identifier (for example `.` in JavaScript) list them in
     *        {@see $triggerCharacters}.
     * @param ?list<string> $allCommitCharacters The list of all possible
     *        characters that commit a completion. This field can be used if clients
     *        don't support individual commit characters per completion item. See
     *        `ClientCapabilities.textDocument.completion.completionItem.commitCharactersSupport`
     *         If a server provides both {@see $allCommitCharacters} and commit characters on
     *        an individual completion item the ones on the completion item win.
     *        - {@since 3.2.0}
     * @param ?bool $resolveProvider The server provides support to resolve additional
     *        information for a completion item.
     * @param ?CompletionOptionsCompletionItem $completionItem The server supports the
     *        following `CompletionItem` specific capabilities.
     *        - {@since 3.17.0}
     * @param list<TextDocumentFilter|NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     */
    public function __construct(
        ?array $triggerCharacters = null,
        ?array $allCommitCharacters = null,
        ?bool $resolveProvider = null,
        ?CompletionOptionsCompletionItem $completionItem = null,
        array|null $documentSelector,
    ) {
        $this->documentSelector = $documentSelector;

        parent::__construct(
            $triggerCharacters,
            $allCommitCharacters,
            $resolveProvider,
            $completionItem,
        );
    }
}
