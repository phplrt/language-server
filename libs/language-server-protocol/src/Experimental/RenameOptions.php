<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * Provider options for a {@link RenameRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class RenameOptions implements
    WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsProvider;

    /**
     * @param ?bool $prepareProvider Renames should be checked and tested before being
     *        executed.
     *        - {@since version 3.12.0}
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        public readonly ?bool $prepareProvider = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->workDoneProgress = $workDoneProgress;
    }
}
