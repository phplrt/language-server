<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Name;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable\ArgumentsListNode;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
class CallableTypeNode extends Type
{
    public function __construct(
        public readonly Name $name,
        public readonly ArgumentsListNode $arguments,
        public readonly ?Type $type = null,
    ) {}
}
