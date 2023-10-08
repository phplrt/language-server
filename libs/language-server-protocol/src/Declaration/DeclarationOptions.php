<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Declaration;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

class DeclarationOptions implements WorkDoneProgressOptions
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
