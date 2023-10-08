<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Twig;

class PhpDocFilterCallback
{
    public function __invoke(string $description, int $depth = 0): string
    {
        return $this->format($depth, static function () use ($description): iterable {
            return \explode("\n", \trim($description, "\n"));
        });
    }

    /**
     * @param int<0, max> $depth
     * @param callable():iterable<string> $ctx
     */
    protected function format(int $depth, callable $ctx): string
    {
        $result = [];
        $prefix = \str_repeat('    ', $depth) . ' * ';

        foreach ($ctx() as $line) {
            $result[] = \trim($line) ? $prefix . $line : \rtrim($prefix);
        }

        return \implode("\n", $result);
    }
}
