<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Rename file operation
 */
final class RenameFile extends ResourceOperation
{
    /**
     * @param string $oldUri The old (existing) location.
     * @param string $newUri The new location.
     * @param ?RenameFileOptions $options Rename options.
     * @param ?string $annotationId An optional annotation identifier
     *        describing the operation.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly string $oldUri,
        public readonly string $newUri,
        public readonly ?RenameFileOptions $options = null,
        ?string $annotationId = null,
    ) {
        parent::__construct('rename', $annotationId);
    }
}
