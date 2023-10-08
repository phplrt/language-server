<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentIdentifier;

/**
 * The parameters sent in a save text document notification
 */
final class DidSaveTextDocumentParams
{
    /**
     * @param TextDocumentIdentifier $textDocument The document that was saved.
     * @param ?string $text Optional the content when saved. Depends on the
     *        includeText value when the save notification was requested.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly ?string $text = null,
    ) {}
}
