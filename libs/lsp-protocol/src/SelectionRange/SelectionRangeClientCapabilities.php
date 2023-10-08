<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SelectionRange;

final class SelectionRangeClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether implementation supports dynamic
     *        registration for selection range providers. If this is set to {@see true} the
     *        client supports the new `SelectionRangeRegistrationOptions` return value
     *        for the corresponding server capability as well.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
