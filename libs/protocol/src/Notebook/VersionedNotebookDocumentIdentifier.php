<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * A versioned notebook document identifier.
 *
 * @since 3.17.0
 */
final class VersionedNotebookDocumentIdentifier extends NotebookDocumentIdentifier
{
    /**
     * @param int $version The version number of this notebook document.
     * @param string $uri The notebook document's uri.
     */
    public function __construct(
        public readonly int $version,
        string $uri,
    ) {
        parent::__construct($uri);
    }
}
