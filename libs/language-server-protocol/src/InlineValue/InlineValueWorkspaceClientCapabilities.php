<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlineValue;

/**
 * Client workspace capabilities specific to inline values.
 *
 * @since 3.17.0
 */
final class InlineValueWorkspaceClientCapabilities
{
    /**
     * @param ?bool $refreshSupport Whether the client implementation supports a
     *        refresh request sent from the server to the client.
     *        Note that this event is global and will force the client to
     *        refresh all inline values currently shown. It should be used with
     *        absolute care and is useful for situation where a server for
     *        example detects a project wide change that requires such a calculation.
     */
    public function __construct(
        public readonly ?bool $refreshSupport = null,
    ) {}
}
