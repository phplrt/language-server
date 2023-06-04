<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * Rename file options
 */
final class RenameFileOptions
{
    /**
     * @param bool|null $overwrite Overwrite existing file. Overwrite wins
     *        over {@see $ignoreIfExists}
     * @param bool|null $ignoreIfExists Ignore if exists.
     */
    public function __construct(
        public readonly ?bool $overwrite = null,
        public readonly ?bool $ignoreIfExists = null,
    ) {}
}
