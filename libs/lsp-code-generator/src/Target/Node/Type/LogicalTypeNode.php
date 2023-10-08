<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
abstract class LogicalTypeNode extends Type
{
    /**
     * @var list<Type>
     */
    public readonly array $statements;

    public function __construct(
        Type $first,
        Type $second,
        Type ...$other
    ) {
        $this->statements = [$first, $second, ...$other];
    }
}
