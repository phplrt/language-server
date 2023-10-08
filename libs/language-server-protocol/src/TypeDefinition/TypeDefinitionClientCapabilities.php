<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TypeDefinition;

/**
 * @since 3.6.0
 */
final class TypeDefinitionClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether implementation supports dynamic
     *        registration. If this is set to {@see true} the client supports the new
     *        `TypeDefinitionRegistrationOptions` return value for the corresponding
     *        server capability as well.
     * @param ?bool $linkSupport The client supports additional metadata in the form of
     *        definition links.
     *         Since 3.14.0
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $linkSupport = null,
    ) {}
}
