<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
abstract class GenericFieldNode extends Statement implements FieldNodeInterface
{
    public function __construct(
        public readonly FieldNodeInterface $of,
    ) {
    }

    public function is(string $class): bool
    {
        return $this instanceof $class || $this->of->is($class);
    }

    public function getValue(): Type
    {
        return $this->of->getValue();
    }
}
