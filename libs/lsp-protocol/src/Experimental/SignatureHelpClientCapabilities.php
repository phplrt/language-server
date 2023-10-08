<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * Client Capabilities for a {@link SignatureHelpRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *                 changed in the future.
 */
class SignatureHelpClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether signature help supports dynamic
     *        registration.
     * @param ?SignatureHelpClientCapabilitiesSignatureInformation $signatureInformation
     *        The client supports the following `SignatureInformation` specific
     *        properties.
     * @param ?bool $contextSupport The client supports to send additional context
     *        information for a
     *        `textDocument/signatureHelp` request. A client that opts into
     *        contextSupport will also support the {@see $retriggerCharacters} on
     *        `SignatureHelpOptions`.
     *        - {@since 3.15.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?SignatureHelpClientCapabilitiesSignatureInformation $signatureInformation = null,
        public readonly ?bool $contextSupport = null,
    ) {}
}
