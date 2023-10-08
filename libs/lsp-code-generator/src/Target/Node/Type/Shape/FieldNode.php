<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class FieldNode extends Statement implements FieldNodeInterface
{
    public function __construct(
        public readonly Type $value,
    ) {}

    public function is(string $class): bool
    {
        return $this instanceof $class;
    }

    public function getValue(): Type
    {
        return $this->value;
    }
}
