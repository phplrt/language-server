<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
enum TraceValues: string
{
    /**
     * Turn tracing off.
     */
    case OFF = "off";

    /**
     * Trace messages only.
     */
    case MESSAGES = "messages";

    /**
     * Verbose message tracing.
     */
    case VERBOSE = "verbose";
}
