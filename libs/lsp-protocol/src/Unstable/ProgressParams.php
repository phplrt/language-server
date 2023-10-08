<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class ProgressParams
{
    /**
     * @param int<-2147483648, 2147483647>|string $token The progress token
     *        provided by the client or server.
     * @param mixed $value The progress data.
     */
    public function __construct(
        public readonly int|string $token,
        public readonly mixed $value,
    ) {}
}
