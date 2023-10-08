<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperations;

/**
 * Represents information on a file/folder create.
 *
 * @since 3.16.0
 */
final class FileCreate
{
    /**
     * @param string $uri A file:// URI for the location of the file/folder
     *        being created.
     */
    public function __construct(
        public readonly string $uri,
    ) {}
}
