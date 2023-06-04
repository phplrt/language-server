<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

final class DidChangeConfigurationClientCapabilities
{
    /**
     * @param bool|null $dynamicRegistration Did change configuration
     *        notification supports dynamic registration.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
