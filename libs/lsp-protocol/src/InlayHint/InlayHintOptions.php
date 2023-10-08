<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlayHint;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * Inlay hint options used during static registration.
 *
 * @since 3.17.0
 */
class InlayHintOptions implements WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsProvider;

    /**
     * @param ?bool $resolveProvider The server provides support to resolve
     *        additional information for an inlay hint item.
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        public readonly ?bool $resolveProvider = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->workDoneProgress = $workDoneProgress;
    }
}
