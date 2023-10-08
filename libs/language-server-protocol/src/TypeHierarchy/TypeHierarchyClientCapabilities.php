<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TypeHierarchy;

/**
 * @since 3.17.0
 */
final class TypeHierarchyClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether implementation supports dynamic
     *        registration. If this is set to {@see true} the client supports the new
     *        `(TextDocumentRegistrationOptions & StaticRegistrationOptions)` return
     *        value for the corresponding server capability as well.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
