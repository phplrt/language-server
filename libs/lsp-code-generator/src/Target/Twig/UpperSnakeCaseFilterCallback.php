<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Twig;

class UpperSnakeCaseFilterCallback extends SnakeCaseFilterCallback
{
    public function __invoke(string $value): string
    {
        return \strtoupper(parent::__invoke($value));
    }
}
