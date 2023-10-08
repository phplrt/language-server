<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\CallHierarchy;

/**
 * @since 3.16.0
 */
final class CallHierarchyClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether implementation supports dynamic
     *        registration. If this is set to {@see true} the client supports the new
     *        `(TextDocumentRegistrationOptions & StaticRegistrationOptions)`
     *        return value for the corresponding server capability as well.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
