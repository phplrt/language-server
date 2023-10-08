<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace;

final class DidChangeConfigurationClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Did change configuration notification
     *        supports dynamic registration.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
