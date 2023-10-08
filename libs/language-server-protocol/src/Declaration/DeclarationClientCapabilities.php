<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Declaration;

/**
 * @since 3.14.0
 */
final class DeclarationClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether declaration supports dynamic
     *        registration. If this is set to {@see true} the client supports
     *        the new `DeclarationRegistrationOptions` return value for the
     *        corresponding server capability as well.
     * @param ?bool $linkSupport The client supports additional metadata in the
     *        form of declaration links.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $linkSupport = null,
    ) {}
}
