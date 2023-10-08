<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * Registration options for a {@link ExecuteCommandRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class ExecuteCommandRegistrationOptions extends ExecuteCommandOptions
{
    /**
     * @param list<string> $commands The commands to be executed on the
     *        server
     */
    public function __construct(
        array $commands,
    ) {
        parent::__construct(
            $commands,
        );
    }
}
