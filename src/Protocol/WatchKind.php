<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

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

    case CREATE_OR_CHANGE = 1 | 2;
    case CREATE_OR_DELETE = 1 | 4;
    case CHANGE_OR_DELETE = 2 | 4;
    case ANY = 1 | 2 | 4;

    public function supportsCreate(): bool
    {
        return ($this->value & self::CREATE->value) === self::CREATE->value;
    }

    public function supportsChange(): bool
    {
        return ($this->value & self::CHANGE->value) === self::CHANGE->value;
    }

    public function supportsDelete(): bool
    {
        return ($this->value & self::DELETE->value) === self::DELETE->value;
    }
}
