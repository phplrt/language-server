<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The client capabilities of a 'workspace/executeCommand' RPC request.
 */
final class ExecuteCommandClientCapabilities
{
    /**
     * @param bool|null $dynamicRegistration Execute command supports dynamic
     *        registration.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
