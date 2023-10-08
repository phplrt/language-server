<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\RelativePattern;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class FileSystemWatcher
{
    /**
     * @param string|RelativePattern $globPattern The glob pattern to watch.
     *        See {@link GlobPattern glob pattern} for more detail.
     *        - {@since 3.17.0} support for relative patterns.
     * @param WatchKind|int<0, 2147483647>|null $kind The kind of events of interest.
     *        If omitted it defaults to WatchKind.Create | WatchKind.Change |
     *        WatchKind.Delete which is 7.
     */
    public function __construct(
        public readonly string|RelativePattern $globPattern,
        public readonly WatchKind|int|null $kind = null,
    ) {}
}
