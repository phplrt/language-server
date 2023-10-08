<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * The data type of the ResponseError if the initialize request fails.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class InitializeError
{
    /**
     * @param bool $retry Indicates whether the client execute the following retry
     *        logic:
     *        (1) show the message provided by the ResponseError to the user
     *        (2) user selects retry or cancel
     *        (3) if user selected retry the initialize method is sent again.
     */
    public function __construct(
        public readonly bool $retry,
    ) {}
}
