<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Twig;

final class DescriptionFilterCallback
{
    public function __invoke(?string $description, int $offset = 0, int $prefix = 0): MultilineResult
    {
        if ($description === null) {
            return new MultilineResult([]);
        }

        return MultilineResult::fromGenerator(function () use ($description, $offset, $prefix): iterable {
            $lines = \str_repeat(' ', $prefix);

            $description = \wordwrap($description, 80 - $offset - \strlen($lines));

            foreach (\explode("\n", $description) as $line) {
                yield $lines . \str_replace("\r", '', $line);
            }
        });
    }
}
