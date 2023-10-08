<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * The file event type.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
enum FileChangeType: int
{
    /**
     * The file got created.
     */
    case CREATED = 1;

    /**
     * The file got changed.
     */
    case CHANGED = 2;

    /**
     * The file got deleted.
     */
    case DELETED = 3;
}
