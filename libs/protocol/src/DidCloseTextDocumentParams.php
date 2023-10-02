<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\Type\TextDocumentItem;

/**
 * The parameters sent in a close text document notification
 */
final class DidCloseTextDocumentParams
{
    /**
     * @param TextDocumentItem $textDocument The document that was closed.
     */
    public function __construct(
        public readonly TextDocumentItem $textDocument,
    ) {}
}
