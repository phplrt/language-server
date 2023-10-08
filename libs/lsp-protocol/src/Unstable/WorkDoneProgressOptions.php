<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class WorkDoneProgressOptions
{
    /**
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
