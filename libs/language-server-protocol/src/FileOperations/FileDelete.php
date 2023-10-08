<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperations;

/**
 * Represents information on a file/folder delete.
 *
 * @since 3.16.0
 */
final class FileDelete
{
    /**
     * @param string $uri A file:// URI for the location of the file/folder
     *        being deleted.
     */
    public function __construct(
        public readonly string $uri,
    ) {}
}
