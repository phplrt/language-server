<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
interface ArgumentNodeInterface
{
    public function getType(): Type;

    /**
     * @param class-string<ArgumentNodeInterface> $class
     */
    public function is(string $class): bool;
}
