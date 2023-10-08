<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class ArgumentNode extends Statement implements ArgumentNodeInterface
{
    public function __construct(
        public readonly Statement $type,
    ) {}

    public function is(string $class): bool
    {
        return $this instanceof $class;
    }

    public function getType(): Statement
    {
        return $this->type;
    }
}
