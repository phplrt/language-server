<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * @psalm-require-implements WorkDoneProgressParams
 */
trait WorkDoneProgressParamsProvider
{
    /**
     * @var int<-2147483648, 2147483647>|string|null An optional
     *      token that a server can use to report work done progress.
     */
    public int|string|null $workDoneToken = null;
}
