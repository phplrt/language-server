<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * Server Capabilities for a {@link SignatureHelpRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class SignatureHelpOptions implements
    WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsProvider;

    /**
     * @param ?list<string> $triggerCharacters List of characters that
     *        trigger signature help automatically.
     * @param ?list<string> $retriggerCharacters List of characters that
     *        re-trigger signature help.
     *         These trigger characters are only active when signature help is already
     *        showing. All trigger characters are also counted as re-trigger
     *        characters.
     *        - {@since 3.15.0}
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        public readonly ?array $triggerCharacters = null,
        public readonly ?array $retriggerCharacters = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->workDoneProgress = $workDoneProgress;
    }
}
