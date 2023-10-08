<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Configuration;

final class ConfigurationItem
{
    /**
     * @param ?string $scopeUri The scope to get the configuration section for.
     * @param ?string $section The configuration section asked for.
     */
    public function __construct(
        public readonly ?string $scopeUri = null,
        public readonly ?string $section = null,
    ) {}
}
