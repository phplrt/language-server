<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * @psalm-require-implements WorkDoneProgressOptions
 */
trait WorkDoneProgressOptionsProvider
{
    /**
     * @param bool|null $workDoneProgress
     */
    public bool|null $workDoneProgress = null;
}
