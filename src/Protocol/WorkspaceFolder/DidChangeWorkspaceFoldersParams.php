<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\WorkspaceFolder;

/**
 * The parameters of a `workspace/didChangeWorkspaceFolders` notification.
 */
final class DidChangeWorkspaceFoldersParams
{
    /**
     * @param WorkspaceFoldersChangeEvent $event The actual workspace folder
     *        change event.
     */
    public function __construct(
        public readonly WorkspaceFoldersChangeEvent $event,
    ) {}
}
