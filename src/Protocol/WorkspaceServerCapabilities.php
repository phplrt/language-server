<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Workspace specific server capabilities.
 */
final class WorkspaceServerCapabilities
{
    /**
     * @param WorkspaceFoldersServerCapabilities|null $workspaceFolders The
     *        server supports workspace folder.
     *        @since 3.6.0
     * @param FileOperationOptions|null $fileOperations The server is interested
     *        in notifications/requests for operations on files.
     *        @since 3.16.0
     */
    public function __construct(
        public readonly ?WorkspaceFoldersServerCapabilities $workspaceFolders = null,
        public readonly ?FileOperationOptions $fileOperations = null,
    ) {}
}
