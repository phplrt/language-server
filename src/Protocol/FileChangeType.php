<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The file event type
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
