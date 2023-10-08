<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * The log message parameters.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class LogMessageParams
{
    /**
     * @param MessageType $type The message type. See {@link MessageType}
     * @param string $message The actual message.
     */
    public function __construct(
        public readonly MessageType $type,
        public readonly string $message,
    ) {}
}
