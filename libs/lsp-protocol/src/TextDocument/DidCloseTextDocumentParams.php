<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\Type\TextDocumentIdentifier;

/**
 * The parameters sent in a close text document notification
 */
final class DidCloseTextDocumentParams
{
    /**
     * @param TextDocumentIdentifier $textDocument The document that was closed.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
    ) {}
}
