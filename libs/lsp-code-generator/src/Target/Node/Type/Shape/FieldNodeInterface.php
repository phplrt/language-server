<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
interface FieldNodeInterface
{
    public function getValue(): Type;

    /**
     * @param class-string<FieldNodeInterface> $class
     */
    public function is(string $class): bool;
}
