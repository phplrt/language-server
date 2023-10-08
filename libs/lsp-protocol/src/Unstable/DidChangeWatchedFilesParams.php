<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * The watched files change notification's parameters.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class DidChangeWatchedFilesParams
{
    /**
     * @param list<FileEvent> $changes The actual file events.
     */
    public function __construct(
        public readonly array $changes,
    ) {}
}
