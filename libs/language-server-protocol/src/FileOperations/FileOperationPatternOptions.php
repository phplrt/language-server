<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperations;

/**
 * Matching options for the file operation pattern.
 *
 * @since 3.16.0
 */
final class FileOperationPatternOptions
{
    /**
     * @param ?bool $ignoreCase The pattern should be matched ignoring casing.
     */
    public function __construct(
        public readonly ?bool $ignoreCase = null,
    ) {}
}
