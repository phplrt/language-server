<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * An item to transfer a text document from the client to the server.
 */
final class TextDocumentItem
{
    /**
     * @param string $uri The text document's uri.
     * @param string $languageId The text document's language identifier.
     * @param int $version The version number of this document (it will increase
     *        after each change, including undo/redo).
     * @param string $text The content of the opened text document.
     */
    public function __construct(
        public readonly string $uri,
        public readonly string $languageId,
        public readonly int $version,
        public readonly string $text,
    ) {}
}
