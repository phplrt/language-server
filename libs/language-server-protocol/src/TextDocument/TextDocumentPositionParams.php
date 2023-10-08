<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\Type\Position;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentIdentifier;

/**
 * A parameter literal used in requests to pass a text document and a position
 * inside that document.
 */
class TextDocumentPositionParams
{
    /**
     * @param TextDocumentIdentifier $textDocument The text document.
     * @param Position $position The position inside the text document.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Position $position,
    ) {}
}
