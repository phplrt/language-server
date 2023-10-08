<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\General;

/**
 * Client capabilities specific to regular expressions.
 *
 * @since 3.16.0
 */
final class RegularExpressionsClientCapabilities
{
    /**
     * @param string $engine The engine's name.
     * @param ?string $version The engine's version.
     */
    public function __construct(
        public readonly string $engine,
        public readonly ?string $version = null,
    ) {}
}
