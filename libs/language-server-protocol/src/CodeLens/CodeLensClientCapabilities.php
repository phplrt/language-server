<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\CodeLens;

/**
 * The client capabilities of a `CodeLensRequest`.
 */
final class CodeLensClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether code lens supports dynamic
     *        registration.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
