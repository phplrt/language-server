<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities;

use Phplrt\LanguageServer\Protocol\ShowDocument\ShowDocumentClientCapabilities;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\Window\ShowMessageRequestClientCapabilities;

final class WindowClientCapabilities
{
    /**
     * @param ?bool $workDoneProgress It indicates whether the client supports
     *        server initiated progress using the `window/workDoneProgress/create`
     *        request.
     *        The capability also controls Whether client supports handling of
     *        progress notifications. If set servers are allowed to report a
     *        {@see $workDoneProgress} property in the request specific server
     *        capabilities.
     *        - {@since 3.15.0}
     * @param ?ShowMessageRequestClientCapabilities $showMessage Capabilities
     *        specific to the showMessage request.
     *        - {@since 3.16.0}
     * @param ?ShowDocumentClientCapabilities $showDocument Capabilities
     *        specific to the showDocument request.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
        public readonly ?ShowMessageRequestClientCapabilities $showMessage = null,
        public readonly ?ShowDocumentClientCapabilities $showDocument = null,
    ) {}
}
