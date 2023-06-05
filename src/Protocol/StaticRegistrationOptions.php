<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Static registration options to be returned in the initialize request.
 */
class StaticRegistrationOptions
{
    /**
     * @param string|null $id The id used to register the request. The id can
     *        be used to deregister the request again.
     *        See also {@see Registration::$id}.
     */
    public function __construct(
        public readonly ?string $id = null,
    ) {}
}
