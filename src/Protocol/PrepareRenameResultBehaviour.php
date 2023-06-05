<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

final class PrepareRenameResultBehaviour
{
    /**
     * @param bool $defaultBehavior
     */
    public function __construct(
        public readonly bool $defaultBehavior,
    ) {}
}
