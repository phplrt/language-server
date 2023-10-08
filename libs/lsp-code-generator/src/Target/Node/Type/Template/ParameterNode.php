<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Template;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
class ParameterNode extends Statement
{
    public function __construct(
        public readonly Type $value
    ) {}
}
