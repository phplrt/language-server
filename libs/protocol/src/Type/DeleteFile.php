<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Delete file operation.
 */
final class DeleteFile extends ResourceOperation
{
    public const KIND = 'delete';

    /**
     * @param string $uri The file to delete.
     * @param DeleteFileOptions|null $options Delete options.
     * @param string|null $annotationId An optional annotation identifier
     *        describing the operation.
     *        - @since 3.16.0
     */
    public function __construct(
        public readonly string $uri,
        public readonly ?DeleteFileOptions $options = null,
        ?string $annotationId = null
    ) {
        parent::__construct(self::KIND, $annotationId);
    }
}
