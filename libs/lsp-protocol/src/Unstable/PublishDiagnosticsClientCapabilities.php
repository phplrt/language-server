<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * The publish diagnostic client capabilities.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *                 changed in the future.
 */
class PublishDiagnosticsClientCapabilities
{
    /**
     * @param ?bool $relatedInformation Whether the clients accepts diagnostics with
     *        related information.
     * @param ?PublishDiagnosticsClientCapabilitiesTagSupport $tagSupport Client
     *        supports the tag property to provide meta data about a diagnostic.
     *        Clients supporting tags have to handle unknown tags gracefully.
     *        - {@since 3.15.0}
     * @param ?bool $versionSupport Whether the client interprets the version property
     *        of the
     *        `textDocument/publishDiagnostics` notification's parameter.
     *        - {@since 3.15.0}
     * @param ?bool $codeDescriptionSupport Client supports a codeDescription property
     *        - {@since 3.16.0}
     * @param ?bool $dataSupport Whether code action supports the {@see $data} property which
     *        is preserved between a `textDocument/publishDiagnostics` and
     *        `textDocument/codeAction` request.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly ?bool $relatedInformation = null,
        public readonly ?PublishDiagnosticsClientCapabilitiesTagSupport $tagSupport = null,
        public readonly ?bool $versionSupport = null,
        public readonly ?bool $codeDescriptionSupport = null,
        public readonly ?bool $dataSupport = null,
    ) {}
}
