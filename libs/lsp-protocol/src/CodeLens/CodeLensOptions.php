<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\CodeLens;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * Code Lens provider options of a {@link CodeLensRequest}.
 */
class CodeLensOptions implements WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsProvider;

    /**
     * @param ?bool $resolveProvider Code lens has a resolve provider as well.
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        public readonly ?bool $resolveProvider = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->workDoneProgress = $workDoneProgress;
    }
}
