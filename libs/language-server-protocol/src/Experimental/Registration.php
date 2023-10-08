<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * General parameters to register for a notification or to register a provider.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class Registration
{
    /**
     * @param string $id The id used to register the request. The id can be
     *        used to deregister the request again.
     * @param string $method The method / capability to register for.
     * @param mixed $registerOptions Options necessary for the registration.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $method,
        public readonly mixed $registerOptions = null,
    ) {}
}
