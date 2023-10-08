<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Printer;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;

interface PrinterInterface
{
    /**
     * @return non-empty-string
     */
    public function print(Statement $stmt): string;
}
