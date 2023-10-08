<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class MessageActionItem
{
    /**
     * @param string $title A short title like 'Retry', 'Open Log' etc.
     */
    public function __construct(
        public readonly string $title,
    ) {}
}
