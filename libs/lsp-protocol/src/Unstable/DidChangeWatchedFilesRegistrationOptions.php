<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * Describe options to be used when registered for text document change events.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class DidChangeWatchedFilesRegistrationOptions
{
    /**
     * @param list<FileSystemWatcher> $watchers The watchers to register.
     */
    public function __construct(
        public readonly array $watchers,
    ) {}
}
