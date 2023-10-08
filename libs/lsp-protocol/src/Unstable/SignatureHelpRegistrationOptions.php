<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptionsProvider;

/**
 * Registration options for a {@link SignatureHelpRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class SignatureHelpRegistrationOptions extends SignatureHelpOptions implements
    TextDocumentRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;

    /**
     * @param ?list<string> $triggerCharacters List of characters that
     *        trigger signature help automatically.
     * @param ?list<string> $retriggerCharacters List of characters that
     *        re-trigger signature help.
     *         These trigger characters are only active when signature help is already
     *        showing. All trigger characters are also counted as re-trigger
     *        characters.
     *        - {@since 3.15.0}
     * @param list<TextDocumentFilter|NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     */
    public function __construct(
        ?array $triggerCharacters = null,
        ?array $retriggerCharacters = null,
        array|null $documentSelector,
    ) {
        $this->documentSelector = $documentSelector;

        parent::__construct(
            $triggerCharacters,
            $retriggerCharacters,
        );
    }
}
