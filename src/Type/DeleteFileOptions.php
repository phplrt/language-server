<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * Delete file options.
 */
final class DeleteFileOptions
{
    /**
     * @param bool|null $recursive Delete the content recursively if a folder
     *        is denoted.
     * @param bool|null $ignoreIfNotExists Ignore the operation if the file
     *       doesn't exist.
     */
    public function __construct(
        public readonly ?bool $recursive = null,
        public readonly ?bool $ignoreIfNotExists = null,
    ) {}
}
