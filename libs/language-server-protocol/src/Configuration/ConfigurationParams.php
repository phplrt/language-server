<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Configuration;

/**
 * The parameters of a configuration request.
 */
final class ConfigurationParams
{
    /**
     * @param list<ConfigurationItem> $items
     */
    public function __construct(
        public readonly array $items,
    ) {}
}
