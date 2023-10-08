<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * An event describing a file change.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class FileEvent
{
    /**
     * @param string $uri The file's uri.
     * @param FileChangeType $type The change type.
     */
    public function __construct(
        public readonly string $uri,
        public readonly FileChangeType $type,
    ) {}
}
