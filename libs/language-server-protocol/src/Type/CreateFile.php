<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Create file operation.
 */
final class CreateFile extends ResourceOperation
{
    /**
     * @param string $uri The resource to create.
     * @param ?CreateFileOptions $options Additional options
     * @param ?string $annotationId An optional annotation identifier
     *        describing the operation.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly string $uri,
        public readonly ?CreateFileOptions $options = null,
        ?string $annotationId = null,
    ) {
        parent::__construct('create', $annotationId);
    }
}
