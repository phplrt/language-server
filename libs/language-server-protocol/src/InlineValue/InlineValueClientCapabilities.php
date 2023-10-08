<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlineValue;

/**
 * Client capabilities specific to inline values.
 *
 * @since 3.17.0
 */
final class InlineValueClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether implementation supports dynamic
     *        registration for inline value providers.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
    ) {}
}
