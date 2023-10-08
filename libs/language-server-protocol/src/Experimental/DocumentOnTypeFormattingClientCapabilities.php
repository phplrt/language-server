<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * Client capabilities of a {@link DocumentOnTypeFormattingRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *                 changed in the future.
 */
class DocumentOnTypeFormattingClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether on type formatting supports dynamic
     *        registration.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
