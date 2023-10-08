<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;

/**
 * General text document registration options.
 *
 * @psalm-require-implements TextDocumentRegistrationOptions
 */
trait TextDocumentRegistrationOptionsProvider
{
    /**
     * @param list<NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If
     *        set to null the document selector provided on the client side
     *        will be used.
     */
    public function __construct(
        public readonly array|null $documentSelector = null,
    ) {}
}
