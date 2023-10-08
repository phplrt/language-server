<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class CancelParams
{
    /**
     * @param int<-2147483648, 2147483647>|string $id The request id to
     *        cancel.
     */
    public function __construct(
        public readonly int|string $id,
    ) {}
}
