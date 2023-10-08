<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Literal\VariableLiteralNode;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class NamedArgumentNode extends GenericArgumentNode
{
    public function __construct(
        public readonly VariableLiteralNode $name,
        ArgumentNodeInterface $of,
    ) {
        parent::__construct($of);
    }

    public function __toString(): string
    {
        return $this->name->getRawValue();
    }
}
