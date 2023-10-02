<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * @deprecated NOT IMPLEMENTED YET
 */
final class FileSystemWatcher
{
    /**
     * @param RelativePattern|string $globPattern The glob pattern to watch.
     *        - @since 3.17.0 support for relative patterns.
     * @param WatchKind|null $kind The kind of events of interest.
     *        If omitted it defaults to {@see WatchKind::ANY}
     */
    public function __construct(
        public readonly RelativePattern|string $globPattern,
        public readonly ?WatchKind $kind = null,
    ) {}
}
