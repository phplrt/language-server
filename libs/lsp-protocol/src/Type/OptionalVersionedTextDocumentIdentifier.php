<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A text document identifier to optionally denote a specific version of a text
 * document.
 */
final class OptionalVersionedTextDocumentIdentifier extends TextDocumentIdentifier
{
    /**
     * @param int<-2147483648, 2147483647>|null $version The version number of
     *        this document. If a versioned text document identifier is sent
     *        from the server to the client and the file is not open in the
     *        editor (the server has not received an open notification before)
     *        the server can send {@see null} to indicate that the version is
     *        unknown and the content on disk is the truth (as specified with
     *        document content ownership).
     * @param string $uri The text document's uri.
     */
    public function __construct(
        public readonly int|null $version,
        string $uri,
    ) {
        parent::__construct($uri);
    }
}
