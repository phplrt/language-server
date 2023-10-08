<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperations;

/**
 * The parameters sent in notifications/requests for user-initiated renames of
 * files.
 *
 * @since 3.16.0
 */
final class RenameFilesParams
{
    /**
     * @param list<FileRename> $files An array of all files/folders renamed in this
     *        operation. When a folder is renamed, only the folder will be included,
     *        and not its children.
     */
    public function __construct(
        public readonly array $files,
    ) {}
}
