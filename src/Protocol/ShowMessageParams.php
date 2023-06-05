<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The parameters of a notification message.
 */
final class ShowMessageParams
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
