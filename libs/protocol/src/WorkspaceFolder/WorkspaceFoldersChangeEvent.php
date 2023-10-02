<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\WorkspaceFolder;

use Phplrt\LanguageServer\Type\WorkspaceFolder;

/**
 * The workspace folder change event.
 */
final class WorkspaceFoldersChangeEvent
{
    /**
     * @param list<WorkspaceFolder> $added The array of added workspace folders
     * @param list<WorkspaceFolder> $removed The array of the removed workspace folders
     */
    public function __construct(
        public readonly array $added,
        public readonly array $removed,
    ) {}
}
