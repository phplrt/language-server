<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

interface FoldingRangeKindInterface
{
    /**
     * @return string
     */
    public function getName(): string;
}
