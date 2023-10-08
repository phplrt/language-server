<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class RenameClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether rename supports dynamic registration.
     * @param ?bool $prepareSupport Client supports testing for validity of rename
     *        operations before execution.
     *        - {@since 3.12.0}
     * @param ?PrepareSupportDefaultBehavior $prepareSupportDefaultBehavior Client
     *        supports the default behavior result.
     *         The value indicates the default behavior used by the client.
     *        - {@since 3.16.0}
     * @param ?bool $honorsChangeAnnotations Whether the client honors the change
     *        annotations in text edits and resource operations returned via the rename
     *        request's workspace edit by for example presenting the workspace edit in
     *        the user interface and asking for confirmation.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $prepareSupport = null,
        public readonly ?PrepareSupportDefaultBehavior $prepareSupportDefaultBehavior = null,
        public readonly ?bool $honorsChangeAnnotations = null,
    ) {}
}
