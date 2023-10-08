<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace;

/**
 * The client capabilities of a {@link ExecuteCommandRequest}.
 */
class ExecuteCommandClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Execute command supports dynamic
     *        registration.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
