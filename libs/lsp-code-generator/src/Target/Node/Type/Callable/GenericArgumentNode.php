<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
abstract class GenericArgumentNode extends Statement implements ArgumentNodeInterface
{
    public function __construct(
        public readonly ArgumentNodeInterface $of,
    ) {}

    public function is(string $class): bool
    {
        return $this instanceof $class || $this->of->is($class);
    }

    public function getType(): Type
    {
        return $this->of->getType();
    }
}
