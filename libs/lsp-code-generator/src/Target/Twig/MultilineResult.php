<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Twig;

final class MultilineResult implements \Stringable
{
    /**
     * @param iterable<array-key, string> $lines
     */
    public function __construct(
        private readonly iterable $lines,
    ) {}

    /**
     * @param callable():iterable<string> $ctx
     */
    public static function fromGenerator(callable $ctx): self
    {
        return new self($ctx());
    }

    public function __toString(): string
    {
        return \implode("\n", [...$this->lines]);
    }
}
