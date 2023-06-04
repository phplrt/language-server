<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * General parameters to to register for an notification or to register
 * a provider.
 */
final class Registration
{
    /**
     * @param string $id The id used to register the request. The id can be used
     *        to deregister the request again.
     * @param string $method The method / capability to register for.
     * @param mixed|null $registerOptions Options necessary for the registration.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $method,
        public readonly mixed $registerOptions = null,
    ) {}
}
