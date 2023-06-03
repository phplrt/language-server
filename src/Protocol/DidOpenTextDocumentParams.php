<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The parameters sent in an open text document notification
 */
final class DidOpenTextDocumentParams
{
    /**
     * @param TextDocumentItem $textDocument The document that was opened.
     */
    public function __construct(
        public readonly TextDocumentItem $textDocument,
    ) {
    }
}
