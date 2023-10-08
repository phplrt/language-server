<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Moniker;

/**
 * Client capabilities specific to the moniker request.
 *
 * @since 3.16.0
 */
final class MonikerClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether moniker supports dynamic
     *        registration. If this is set to {@see true} the client supports
     *        the new {@see MonikerRegistrationOptions} return value for the
     *        corresponding server capability as well.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
