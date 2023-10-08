<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentIdentifier;

/**
 * A text document identifier to denote a specific version of a text document.
 */
final class VersionedTextDocumentIdentifier extends TextDocumentIdentifier
{
    /**
     * @param int<-2147483648, 2147483647> $version The version number of this
     *        document.
     * @param string $uri The text document's uri.
     */
    public function __construct(
        public readonly int $version,
        string $uri,
    ) {
        parent::__construct($uri);
    }
}
