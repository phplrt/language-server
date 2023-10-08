<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * Provider options for a {@link DocumentRangeFormattingRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class DocumentRangeFormattingOptions implements
    WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsProvider;

    /**
     * @param ?bool $rangesSupport Whether the server supports formatting multiple
     *        ranges at once.
     *        - {@since 3.18.0}
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        public readonly ?bool $rangesSupport = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->workDoneProgress = $workDoneProgress;
    }
}
