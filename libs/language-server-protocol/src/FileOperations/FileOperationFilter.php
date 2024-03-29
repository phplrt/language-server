<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FileOperations;

/**
 * A filter to describe in which file operation requests or notifications the
 * server is interested in receiving.
 *
 * @since 3.16.0
 */
final class FileOperationFilter
{
    /**
     * @param ?string $scheme A Uri scheme like `file` or `untitled`.
     * @param FileOperationPattern $pattern The actual file operation pattern.
     */
    public function __construct(
        public readonly FileOperationPattern $pattern,
        public readonly ?string $scheme = null,
    ) {}
}
