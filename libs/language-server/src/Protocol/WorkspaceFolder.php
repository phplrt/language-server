<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * A workspace folder inside a client.
 */
final class WorkspaceFolder
{
    /**
     * @param string $uri The associated URI for this workspace folder.
     * @param string $name The name of the workspace folder. Used to refer to this workspace folder in the user
     *        interface.
     */
    public function __construct(
        public readonly string $uri,
        public readonly string $name,
    ) {
    }
}
