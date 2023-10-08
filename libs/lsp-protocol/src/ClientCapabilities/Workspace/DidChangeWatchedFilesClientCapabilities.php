<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace;

use Phplrt\LanguageServer\Protocol\RelativePattern;

class DidChangeWatchedFilesClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Did change watched files notification
     *        supports dynamic registration. Please note that the current
     *        protocol doesn't support static configuration for file changes
     *        from the server side.
     * @param ?bool $relativePatternSupport Whether the client has support for
     *        {@link RelativePattern} relative pattern or not.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $relativePatternSupport = null,
    ) {}
}
