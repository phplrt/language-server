<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * A literal to identify a notebook document in the client.
 *
 * @since 3.17.0
 */
class NotebookDocumentIdentifier
{
    /**
     * @param string $uri The notebook document's uri.
     */
    public function __construct(
        public readonly string $uri,
    ) {}
}
