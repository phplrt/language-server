<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
enum WatchKind: int
{
    /**
     * Interested in create events.
     */
    case CREATE = 1;

    /**
     * Interested in change events
     */
    case CHANGE = 2;

    /**
     * Interested in delete events
     */
    case DELETE = 4;
}
