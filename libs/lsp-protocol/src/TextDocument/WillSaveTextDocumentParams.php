<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\Type\TextDocumentIdentifier;

/**
 * The parameters sent in a will save text document notification.
 */
final class WillSaveTextDocumentParams
{
    /**
     * @param TextDocumentIdentifier $textDocument The document that will be saved.
     * @param TextDocumentSaveReason $reason The 'TextDocumentSaveReason'.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly TextDocumentSaveReason $reason,
    ) {}
}
