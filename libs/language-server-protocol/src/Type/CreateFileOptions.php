<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Options to create a file.
 */
final class CreateFileOptions
{
    /**
     * @param ?bool $overwrite Overwrite existing file. Overwrite wins over
     *        {@see $ignoreIfExists}
     * @param ?bool $ignoreIfExists Ignore if exists.
     */
    public function __construct(
        public readonly ?bool $overwrite = null,
        public readonly ?bool $ignoreIfExists = null,
    ) {}
}
