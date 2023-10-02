<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Create file operation.
 */
final class CreateFile extends ResourceOperation
{
    public const KIND = 'create';

    /**
     * @param string $uri The resource to create.
     * @param CreateFileOptions|null $options Additional options
     * @param string|null $annotationId An optional annotation identifier
     *        describing the operation.
     *        - @since 3.16.0
     */
    public function __construct(
        public readonly string $uri,
        public readonly ?CreateFileOptions $options = null,
        ?string $annotationId = null
    ) {
        parent::__construct(self::KIND, $annotationId);
    }
}
