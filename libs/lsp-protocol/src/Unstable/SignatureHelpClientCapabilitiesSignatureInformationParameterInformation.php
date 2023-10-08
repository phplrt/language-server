<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class SignatureHelpClientCapabilitiesSignatureInformationParameterInformation
{
    /**
     * @param ?bool $labelOffsetSupport The client supports processing label offsets
     *        instead of a simple label string.
     *        - {@since 3.14.0}
     */
    public function __construct(
        public readonly ?bool $labelOffsetSupport = null,
    ) {}
}
