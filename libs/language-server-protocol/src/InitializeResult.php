<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\InitializeResult\ServerInfo;
use Phplrt\LanguageServer\Protocol\ServerCapabilities;

/**
 * The result returned from an initialize request.
 */
final class InitializeResult
{
    /**
     * @param ServerCapabilities $capabilities The capabilities the language server
     *        provides.
     * @param ?ServerInfo $serverInfo Information about the server.
     *        - {@since 3.15.0}
     */
    public function __construct(
        public readonly ServerCapabilities $capabilities,
        public readonly ?ServerInfo $serverInfo = null,
    ) {}
}
