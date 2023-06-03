<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The client support partial workspace symbols. The client will send the
 * request `workspaceSymbol/resolve` to the server to resolve additional
 * properties.
 *
 * @since 3.17.0
 */
final class ResolveSupportCapabilities
{
    /**
     * @param list<string> $properties The properties that a client can resolve
     *        lazily. Usually `location.range`.
     */
    public function __construct(
        public readonly array $properties = [],
    ) {
    }
}
