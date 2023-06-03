<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The options to register for file operations.
 *
 * @since 3.16.0
 */
final class FileOperationRegistrationOptions
{
    /**
     * @param list<FileOperationFilter> $filters The actual filters.
     */
    public function __construct(
        public readonly array $filters = [],
    ) {
    }
}
