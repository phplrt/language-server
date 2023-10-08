<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;

/**
 * Save registration options.
 */
final class TextDocumentSaveRegistrationOptions extends SaveOptions implements
    TextDocumentRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;

    /**
     * @param ?bool $includeText The client is supposed to include the content on save.
     * @param list<NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     */
    public function __construct(
        ?bool $includeText = null,
        array|null $documentSelector,
    ) {
        $this->documentSelector = $documentSelector;

        parent::__construct($includeText);
    }
}
