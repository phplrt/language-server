<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperations;

/**
 * Represents information on a file/folder rename.
 *
 * @since 3.16.0
 */
final class FileRename
{
    /**
     * @param string $oldUri A file:// URI for the original location of the
     *        file/folder being renamed.
     * @param string $newUri A file:// URI for the new location of the
     *        file/folder being renamed.
     */
    public function __construct(
        public readonly string $oldUri,
        public readonly string $newUri,
    ) {}
}
