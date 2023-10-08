<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 *
 * @template-implements \IteratorAggregate<array-key, FieldNodeInterface>
 */
class FieldsListNode extends Statement implements \IteratorAggregate, \Countable
{
    /**
     * @param list<FieldNodeInterface> $list
     */
    public function __construct(
        public readonly array $list = [],
        public readonly bool $sealed = true,
    ) {}

    /**
     * @param iterable<array-key, FieldNodeInterface> $list
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

    public function __toString(): string
    {
        return $this->sealed ? 'sealed' : 'unsealed';
    }
}
