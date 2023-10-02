<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Describe options to be used when registered for text document change events.
 */
final class DidChangeWatchedFilesRegistrationOptions
{
    /**
     * @param list<FileSystemWatcher> $watchers
     */
    public function __construct(
        public readonly array $watchers,
    ) {}
}
