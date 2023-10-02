<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

class WorkDoneProgressParams
{
    /**
     * @param int|non-empty-string|null $progressToken An optional token that a
     *        server can use to report work done progress.
     */
    public function __construct(
        public readonly int|string|null $progressToken = null,
    ) {}
}
