<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Information about the client
 *
 * @since 3.15.0
 */
final class ClientInfo
{
    /**
     * @param string $name The name of the client as defined by the client.
     * @param string|null $version The client's version as defined by the client.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $version,
    ) {}
}
