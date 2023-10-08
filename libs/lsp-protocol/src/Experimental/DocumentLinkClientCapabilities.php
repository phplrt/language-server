<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * The client capabilities of a {@link DocumentLinkRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *                 changed in the future.
 */
class DocumentLinkClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether document link supports dynamic
     *        registration.
     * @param ?bool $tooltipSupport Whether the client supports the {@see $tooltip} property
     *        on `DocumentLink`.
     *        - {@since 3.15.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $tooltipSupport = null,
    ) {}
}
