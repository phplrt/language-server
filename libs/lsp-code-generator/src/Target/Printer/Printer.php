<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Printer;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\LogicalTypeNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;

abstract class Printer implements PrinterInterface
{
    /**
     * @var int<0, max>
     */
    protected int $depth = 0;

    /**
     * @var int<0, max>
     */
    protected int $nesting = 0;

    /**
     * @var non-empty-string
     */
    protected const DEFAULT_NEW_LINE_DELIMITER = "\n";

    /**
     * @var non-empty-string
     */
    protected const DEFAULT_INDENTION = '    ';

    /**
     * @param non-empty-string $newLine
     * @param non-empty-string $indention
     */
    public function __construct(
        protected readonly string $newLine = self::DEFAULT_NEW_LINE_DELIMITER,
        protected readonly string $indention = self::DEFAULT_INDENTION,
    ) {}

    public function print(Statement $stmt): string
    {
        $this->nesting = $this->depth = 0;

        return $this->make($stmt);
    }

    /**
     * @return non-empty-string
     */
    abstract protected function make(Statement $stmt): string;

    /**
     * @param int<0, max>|null $depth
     */
    protected function prefix(int $depth = null): string
    {
        $depth ??= $this->depth;

        if ($depth <= 0) {
            return '';
        }

        return \str_repeat($this->indention, $depth);
    }

    /**
     * @template TResult of mixed
     *
     * @param callable():TResult $section
     *
     * @return TResult
     */
    protected function nested(callable $section): mixed
    {
        ++$this->depth;

        $result = $section();

        --$this->depth;

        return $result;
    }

    /**
     * @param iterable<mixed, Statement> $stmts
     *
     * @return list<non-empty-string>
     */
    protected function printMap(iterable $stmts): array
    {
        $result = [];

        foreach ($stmts as $stmt) {
            $result[] = $this->make($stmt);
        }

        /** @var list<non-empty-string> */
        return \array_unique($result);
    }

    /**
     * @return iterable<array-key, Statement>
     */
    protected function unwrap(LogicalTypeNode $logical): iterable
    {
        foreach ($logical->statements as $stmt) {
            yield from $stmt instanceof $logical ? $this->unwrap($stmt) : [$stmt];
        }
    }

    /**
     * @return iterable<array-key, non-empty-string>
     */
    protected function unwrapAndPrint(LogicalTypeNode $stmt): iterable
    {
        return $this->printMap($this->unwrap($stmt));
    }
}
