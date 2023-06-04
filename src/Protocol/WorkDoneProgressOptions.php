<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

class WorkDoneProgressOptions
{
    public function __construct(
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
