<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ColorProvider;

final class DocumentColorClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether implementation supports dynamic
     *        registration. If this is set to {@see true} the client supports the new
     *        `DocumentColorRegistrationOptions` return value for the corresponding
     *        server capability as well.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
