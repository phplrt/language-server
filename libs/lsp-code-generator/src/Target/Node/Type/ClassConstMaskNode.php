<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Name;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
class ClassConstMaskNode extends Type
{
    /**
     * @param non-empty-string|null $constant
     */
    public function __construct(
        public readonly Name $class,
        public readonly ?string $constant = null,
    ) {}

    public function __toString(): string
    {
        return (string)$this->constant . '*';
    }
}
