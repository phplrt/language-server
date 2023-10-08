<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TypeHierarchy;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * Type hierarchy options used during static registration.
 *
 * @since 3.17.0
 */
class TypeHierarchyOptions implements WorkDoneProgressOptions
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
