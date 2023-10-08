<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
enum PrepareSupportDefaultBehavior: int
{
    /**
     * The client's default behavior is to select the identifier according the
     * to language's syntax rule.
     */
    case IDENTIFIER = 1;
}
