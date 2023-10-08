<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class ShowMessageRequestParams
{
    /**
     * @param MessageType $type The message type. See {@link MessageType}
     * @param string $message The actual message.
     * @param ?list<MessageActionItem> $actions The message action items to present.
     */
    public function __construct(
        public readonly MessageType $type,
        public readonly string $message,
        public readonly ?array $actions = null,
    ) {}
}
