<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceEdit;

enum ResourceOperationKind: string
{
    /**
     * Supports creating new files and folders.
     */
    case CREATE = "create";

    /**
     * Supports renaming existing files and folders.
     */
    case RENAME = "rename";

    /**
     * Supports deleting existing files and folders.
     */
    case DELETE = "delete";
}
