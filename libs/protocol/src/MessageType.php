<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The message type.
 */
enum MessageType: int
{
    /**
     * An error message.
     */
    case ERROR = 1;

    /**
     * A warning message.
     */
    case WARNING = 2;

    /**
     * An information message.
     */
    case INFO = 3;

    /**
     * A log message.
     */
    case LOG = 4;
}
