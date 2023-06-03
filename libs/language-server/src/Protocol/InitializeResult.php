<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The result returned from an initialize request.
 */
final class InitializeResult
{
    /**
     * @param ServerCapabilities $capabilities The capabilities the language
     *        server provides.
     * @param ServerInfo|null $serverInfo Information about the server.
     *        @since 3.15.0
     * @param mixed $custom Custom initialization results.
     */
    public function __construct(
        public readonly ServerCapabilities $capabilities = new ServerCapabilities(),
        public readonly ?ServerInfo $serverInfo = null,
        public readonly mixed $custom = null,
    ) {
    }
}
