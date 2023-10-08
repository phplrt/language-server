<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;

/**
 * Describe options to be used when registered for text document change events.
 */
final class TextDocumentChangeRegistrationOptions implements TextDocumentRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;

    /**
     * @param TextDocumentSyncKind $syncKind How documents are synced to the server.
     * @param list<NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     */
    public function __construct(
        public readonly TextDocumentSyncKind $syncKind,
        array|null $documentSelector,
    ) {
        $this->documentSelector = $documentSelector;
    }
}
