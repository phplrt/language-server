<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperations;

/**
 * The parameters sent in notifications/requests for user-initiated creation of
 * files.
 *
 * @since 3.16.0
 */
final class CreateFilesParams
{
    /**
     * @param list<FileCreate> $files An array of all files/folders created in
     *        this operation.
     */
    public function __construct(
        public readonly array $files,
    ) {}
}
