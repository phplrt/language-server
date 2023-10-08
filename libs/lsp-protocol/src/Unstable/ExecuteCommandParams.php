<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressParams;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParamsProvider;

/**
 * The parameters of a {@link ExecuteCommandRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class ExecuteCommandParams implements
    WorkDoneProgressParams
{
    use WorkDoneProgressParamsProvider;

    /**
     * @param string $command The identifier of the actual command handler.
     * @param ?list<mixed> $arguments Arguments that the command should be invoked
     *        with.
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     */
    public function __construct(
        public readonly string $command,
        public readonly ?array $arguments = null,
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
