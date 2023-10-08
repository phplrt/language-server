<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\CodeActionKind;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * Provider options for a {@link CodeActionRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class CodeActionOptions implements
    WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsProvider;

    /**
     * @param ?list<CodeActionKind|string> $codeActionKinds CodeActionKinds
     *        that this server may return.
     *         The list of kinds may be generic, such as `CodeActionKind.Refactor`, or
     *        the server may list out every specific kind they provide.
     * @param ?bool $resolveProvider The server provides support to resolve additional
     *        information for a code action.
     *        - {@since 3.16.0}
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        public readonly ?array $codeActionKinds = null,
        public readonly ?bool $resolveProvider = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->workDoneProgress = $workDoneProgress;
    }
}
