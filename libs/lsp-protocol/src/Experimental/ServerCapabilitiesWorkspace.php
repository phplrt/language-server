<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\FileOperations\FileOperationOptions;
use Phplrt\LanguageServer\Protocol\WorkspaceFolder\WorkspaceFoldersServerCapabilities;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class ServerCapabilitiesWorkspace
{
    /**
     * @param ?WorkspaceFoldersServerCapabilities $workspaceFolders The server supports
     *        workspace folder.
     *        - {@since 3.6.0}
     * @param ?FileOperationOptions $fileOperations The server is interested in
     *        notifications/requests for operations on files.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly ?WorkspaceFoldersServerCapabilities $workspaceFolders = null,
        public readonly ?FileOperationOptions $fileOperations = null,
    ) {}
}
