<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\LinkedEditingRange;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

class LinkedEditingRangeOptions implements WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsProvider;

    /**
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        ?bool $workDoneProgress = null,
    ) {
        $this->workDoneProgress = $workDoneProgress;
    }
}
