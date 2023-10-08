<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class LogTraceParams
{
    /**
     * @param string $message
     * @param ?string $verbose
     */
    public function __construct(
        public readonly string $message,
        public readonly ?string $verbose = null,
    ) {}
}
