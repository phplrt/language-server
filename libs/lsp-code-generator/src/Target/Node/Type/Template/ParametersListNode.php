<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Template;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 *
 * @template-implements \IteratorAggregate<array-key, ParameterNode>
 */
class ParametersListNode extends Statement implements \IteratorAggregate, \Countable
{
    /**
     * @param list<ParameterNode> $list
     */
    final public function __construct(
        public readonly array $list = [],
    ) {}

    /**
     * @param iterable<array-key, ParameterNode> $list
     */
    public static function new(iterable $list): self
    {
        if ($list instanceof static) {
            return $list;
        }

        return new static([...$list]);
    }

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
