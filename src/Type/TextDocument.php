<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * A simple text document. Not to be implemented. The document keeps the content
 * as string.
 */
final class TextDocument
{
    /**
     * @param string $uri The associated URI for this document. Most documents
     *        have the __file__-scheme, indicating that they represent files on
     *        disk. However, some documents may have other schemes indicating
     *        that they are not available on disk.
     * @param string $languageId The identifier of the language associated with
     *        this document.
     * @param int $version The version number of this document (it will increase
     *        after each change, including undo/redo).
     * @param int $lineCount The number of lines in this document.
     */
    public function __construct(
        public readonly string $uri,
        public readonly string $languageId,
        public readonly int $version,
        public readonly int $lineCount,
    ) {}
}
