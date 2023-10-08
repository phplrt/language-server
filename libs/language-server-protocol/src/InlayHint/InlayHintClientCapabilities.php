<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlayHint;

/**
 * Inlay hint client capabilities.
 *
 * @since 3.17.0
 */
final class InlayHintClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether inlay hints support dynamic
     *        registration.
     * @param ?InlayHintClientCapabilitiesResolveSupport $resolveSupport Indicates
     *        which properties a client can resolve lazily on an inlay hint.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?InlayHintClientCapabilitiesResolveSupport $resolveSupport = null,
    ) {}
}
