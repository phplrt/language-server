<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * Registration options for a {@link WorkspaceSymbolRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class WorkspaceSymbolRegistrationOptions extends WorkspaceSymbolOptions
{
    /**
     * @param ?bool $resolveProvider The server provides support to resolve additional
     *        information for a workspace symbol.
     *        - {@since 3.17.0}
     */
    public function __construct(
        ?bool $resolveProvider = null,
    ) {
        parent::__construct(
            $resolveProvider,
        );
    }
}
