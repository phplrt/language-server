<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * Client capabilities of a {@link DocumentRangeFormattingRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *                 changed in the future.
 */
class DocumentRangeFormattingClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether range formatting supports dynamic
     *        registration.
     * @param ?bool $rangesSupport Whether the client supports formatting multiple
     *        ranges at once.
     *        - {@since 3.18.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $rangesSupport = null,
    ) {}
}
