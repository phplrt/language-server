<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Twig;

class SnakeCaseFilterCallback
{
    public function __invoke(string $value): string
    {
        return \strtolower(\preg_replace('/([a-z])([A-Z])/u', '$1_$2', $value));
    }
}
