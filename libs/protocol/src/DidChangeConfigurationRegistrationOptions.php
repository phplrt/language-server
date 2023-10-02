<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

final class DidChangeConfigurationRegistrationOptions
{
    /**
     * @param string|list<string>|null $section
     */
    public function __construct(
        public readonly string|array|null $section = null,
    ) {}
}
