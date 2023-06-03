<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * A notebook document filter denotes a notebook document by
 * different properties. The properties will be match
 * against the notebook's URI (same as with documents)
 *
 * @since 3.17.0
 */
final class NotebookDocumentFilter
{
    /**
     * Note: One of parameter is required.
     *
     * @param string|null $notebookType The type of the enclosing notebook.
     * @param string|null $scheme A Uri scheme, like `file` or `untitled`.
     *        Scheme is the `http` part of `http://www.example.com/some/path?query#fragment`.
     *        The part before the first colon.
     * @param string|null $pattern A glob pattern, like `*.{ts,js}`.
     */
    public function __construct(
        public readonly ?string $notebookType = null,
        public readonly ?string $scheme = null,
        public readonly ?string $pattern = null,
    ) {
        assert($notebookType !== null || $scheme !== null || $pattern !== null);
    }
}
