<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * @since 3.16.0
 */
final class CodeLensWorkspaceClientCapabilities
{
    /**
     * @param bool|null $refreshSupport Whether the client implementation
     *        supports a refresh request sent from the server to the client.
     *
     *        Note that this event is global and will force the client to
     *        refresh all code lenses currently shown. It should be used with
     *        absolute care and is useful for situation where a server for
     *        example detect a project wide change that requires such a
     *        calculation.
     */
    public function __construct(
        public readonly ?bool $refreshSupport = null,
    ) {
    }
}
