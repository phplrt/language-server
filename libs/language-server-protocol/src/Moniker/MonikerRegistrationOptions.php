<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Moniker;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptionsProvider;

final class MonikerRegistrationOptions extends MonikerOptions implements
    TextDocumentRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;

    /**
     * @param list<TextDocumentFilter|NotebookCellTextDocumentFilter|string>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        array|null $documentSelector,
        ?bool $workDoneProgress = null,
    ) {
        $this->documentSelector = $documentSelector;

        parent::__construct($workDoneProgress);
    }
}
