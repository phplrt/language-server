<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptionsProvider;

/**
 * Registration options for a {@link RenameRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class RenameRegistrationOptions extends RenameOptions implements
    TextDocumentRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;

    /**
     * @param ?bool $prepareProvider Renames should be checked and tested before being
     *        executed.
     *        - {@since version 3.12.0}
     * @param list<TextDocumentFilter|NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     */
    public function __construct(
        ?bool $prepareProvider = null,
        array|null $documentSelector,
    ) {
        $this->documentSelector = $documentSelector;

        parent::__construct(
            $prepareProvider,
        );
    }
}
