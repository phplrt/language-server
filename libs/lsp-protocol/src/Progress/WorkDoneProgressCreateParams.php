<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Progress;

final class WorkDoneProgressCreateParams
{
    /**
     * @param int<-2147483648, 2147483647>|string $token The token to be used
     *        to report progress.
     */
    public function __construct(
        public readonly int|string $token,
    ) {}
}
