<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A literal to identify a text document in the client.
 */
class TextDocumentIdentifier
{
    /**
     * @param string $uri The text document's uri.
     */
    public function __construct(
        public readonly string $uri,
    ) {
    }
}
