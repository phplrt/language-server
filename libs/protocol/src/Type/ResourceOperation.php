<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A generic resource operation.
 */
class ResourceOperation
{
    /**
     * @param string $kind The resource operation kind.
     * @param string|null $annotationId An optional annotation identifier
     *        describing the operation.
     *        - @since 3.16.0
     */
    public function __construct(
        public readonly string $kind,
        public readonly ?string $annotationId = null,
    ) {}
}
