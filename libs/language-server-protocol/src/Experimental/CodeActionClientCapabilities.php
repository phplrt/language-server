<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * The Client Capabilities of a {@link CodeActionRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class CodeActionClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether code action supports dynamic
     *        registration.
     * @param ?CodeActionClientCapabilitiesCodeActionLiteralSupport $codeActionLiteralSupport
     *        The client support code action literals of type `CodeAction` as a valid
     *        response of the `textDocument/codeAction` request. If the property is not
     *        set the request can only return `Command` literals.
     *        - {@since 3.8.0}
     * @param ?bool $isPreferredSupport Whether code action supports the {@see $isPreferred}
     *        property.
     *        - {@since 3.15.0}
     * @param ?bool $disabledSupport Whether code action supports the {@see $disabled}
     *        property.
     *        - {@since 3.16.0}
     * @param ?bool $dataSupport Whether code action supports the {@see $data} property which
     *        is preserved between a `textDocument/codeAction` and a
     *        `codeAction/resolve` request.
     *        - {@since 3.16.0}
     * @param ?CodeActionClientCapabilitiesResolveSupport $resolveSupport Whether the
     *        client supports resolving additional code action properties via a
     *        separate `codeAction/resolve` request.
     *        - {@since 3.16.0}
     * @param ?bool $honorsChangeAnnotations Whether the client honors the change
     *        annotations in text edits and resource operations returned via the
     *        `CodeAction#edit` property by for example presenting the workspace edit
     *        in the user interface and asking for confirmation.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?CodeActionClientCapabilitiesCodeActionLiteralSupport $codeActionLiteralSupport = null,
        public readonly ?bool $isPreferredSupport = null,
        public readonly ?bool $disabledSupport = null,
        public readonly ?bool $dataSupport = null,
        public readonly ?CodeActionClientCapabilitiesResolveSupport $resolveSupport = null,
        public readonly ?bool $honorsChangeAnnotations = null,
    ) {}
}
