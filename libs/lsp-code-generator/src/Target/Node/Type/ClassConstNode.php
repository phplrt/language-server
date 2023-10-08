<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Name;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
class ClassConstNode extends ClassConstMaskNode
{
    /**
     * @param non-empty-string $constant
     */
    public function __construct(Name $class, string $constant)
    {
        parent::__construct($class, $constant);
    }

    public function __toString(): string
    {
        return (string)$this->constant;
    }
}
