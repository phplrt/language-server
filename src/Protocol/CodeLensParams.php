<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

final class CodeLensParams
{
    /**
     * @param TextDocumentIdentifier $textDocument The document to request code lens for.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
    ) {
    }
}
