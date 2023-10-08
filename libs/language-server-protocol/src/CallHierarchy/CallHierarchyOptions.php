<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\CallHierarchy;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * Call hierarchy options used during static registration.
 *
 * @since 3.16.0
 */
class CallHierarchyOptions implements WorkDoneProgressOptions
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
