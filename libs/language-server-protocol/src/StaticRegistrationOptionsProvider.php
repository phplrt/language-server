<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Static registration options to be returned in the initialize request.
 *
 * @psalm-require-implements StaticRegistrationOptions
 */
trait StaticRegistrationOptionsProvider
{
    /**
     * The id used to register the request. The id can be used to deregister
     * the request again.
     *
     * @var string|null
     */
    public string|null $id = null;
}
