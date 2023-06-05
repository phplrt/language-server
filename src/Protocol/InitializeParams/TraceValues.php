<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InitializeParams;

enum TraceValues: string
{
    /**
     * Turn tracing off.
     */
    case OFF = 'off';

    /**
     * Trace messages only.
     */
    case MESSAGES = 'messages';

    /**
     * Compact message tracing.
     */
    case COMPACT = 'compact';

    /**
     * Verbose message tracing.
     */
    case VERBOSE = 'verbose';
}
