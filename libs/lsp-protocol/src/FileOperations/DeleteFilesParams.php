<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperations;

/**
 * The parameters sent in notifications/requests for user-initiated deletes of
 * files.
 *
 * @since 3.16.0
 */
final class DeleteFilesParams
{
    /**
     * @param list<FileDelete> $files An array of all files/folders deleted in
     *        this operation.
     */
    public function __construct(
        public readonly array $files,
    ) {}
}
