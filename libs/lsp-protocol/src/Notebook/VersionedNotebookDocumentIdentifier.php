<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * A versioned notebook document identifier.
 *
 * @since 3.17.0
 */
final class VersionedNotebookDocumentIdentifier
{
    /**
     * @param int<-2147483648, 2147483647> $version The version number of this
     *        notebook document.
     * @param string $uri The notebook document's uri.
     */
    public function __construct(
        public readonly int $version,
        public readonly string $uri,
    ) {}
}
