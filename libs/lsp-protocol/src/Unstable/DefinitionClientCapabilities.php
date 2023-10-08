<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * Client Capabilities for a {@link DefinitionRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class DefinitionClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether definition supports dynamic
     *        registration.
     * @param ?bool $linkSupport The client supports additional metadata in the form of
     *        definition links.
     *        - {@since 3.14.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $linkSupport = null,
    ) {}
}
