<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 *
 * @template-implements \IteratorAggregate<array-key, ArgumentNodeInterface>
 */
class ArgumentsListNode extends Statement implements \IteratorAggregate, \Countable
{
    /**
     * @param list<ArgumentNodeInterface> $list
     */
    public function __construct(
        public readonly array $list = [],
    ) {}

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->list);
    }

    /**
     * @return int<0, max>
     */
    public function count(): int
    {
        return \count($this->list);
    }
}
