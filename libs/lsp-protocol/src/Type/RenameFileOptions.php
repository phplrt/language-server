<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Rename file options
 */
final class RenameFileOptions
{
    /**
     * @param ?bool $overwrite Overwrite target if existing. Overwrite wins over
     *        {@see $ignoreIfExists}
     * @param ?bool $ignoreIfExists Ignores if target exists.
     */
    public function __construct(
        public readonly ?bool $overwrite = null,
        public readonly ?bool $ignoreIfExists = null,
    ) {}
}
