<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * The parameters of a notification message.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class ShowMessageParams
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
