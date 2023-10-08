<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * The message type
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
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

    /**
     * A debug message.
     *
     * @since 3.18.0
     */
    case DEBUG = 5;
}
