<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * Structure to capture a description for an error code.
 *
 * @since 3.16.0
 */
final class CodeDescription
{
    /**
     * @param string $href An URI to open with more information about the
     *        diagnostic error.
     */
    public function __construct(
        public readonly string $href,
    ) {}
}
