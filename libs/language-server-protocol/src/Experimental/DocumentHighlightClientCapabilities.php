<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * Client Capabilities for a {@link DocumentHighlightRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class DocumentHighlightClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether document highlight supports dynamic
     *        registration.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
