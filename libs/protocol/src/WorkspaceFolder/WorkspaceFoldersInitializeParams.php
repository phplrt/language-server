<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\WorkspaceFolder;

use Phplrt\LanguageServer\Protocol\Type\WorkspaceFolder;

class WorkspaceFoldersInitializeParams
{
    /**
     * @param list<WorkspaceFolder>|null $workspaceFolders The workspace folders
     *        configured in the client when the server starts.
     *
     *        This property is only available if the client supports workspace
     *        folders. It can be {@see null} if the client supports workspace
     *        folders but none are configured.
     *        - @since 3.6.0
     */
    public function __construct(
        public readonly ?array $workspaceFolders = null,
    ) {}
}
