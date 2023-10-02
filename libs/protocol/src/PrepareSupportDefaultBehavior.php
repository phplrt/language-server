<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

enum PrepareSupportDefaultBehavior: int
{
    /**
     * The client's default behavior is to select the identifier according
     * the to language's syntax rule.
     */
    case IDENTIFIER = 1;
}
