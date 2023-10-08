<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlineValue;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * Inline value options used during static registration.
 *
 * @since 3.17.0
 */
class InlineValueOptions implements WorkDoneProgressOptions
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
