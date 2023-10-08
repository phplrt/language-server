<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\MarkupKind;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class SignatureHelpClientCapabilitiesSignatureInformation
{
    /**
     * @param ?list<MarkupKind> $documentationFormat Client supports the following
     *        content formats for the documentation property. The order describes the
     *        preferred format of the client.
     * @param ?SignatureHelpClientCapabilitiesSignatureInformationParameterInformation $parameterInformation
     *        Client capabilities specific to parameter information.
     * @param ?bool $activeParameterSupport The client supports the {@see $activeParameter}
     *        property on `SignatureInformation` literal.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly ?array $documentationFormat = null,
        public readonly ?SignatureHelpClientCapabilitiesSignatureInformationParameterInformation $parameterInformation = null,
        public readonly ?bool $activeParameterSupport = null,
    ) {}
}
