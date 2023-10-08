<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Twig;

final class TagFilterCallback
{
    public function __invoke(?string $description, string $tag, string $type = null): MultilineResult
    {
        return MultilineResult::fromGenerator(function () use ($tag, $description, $type): iterable {
            $prefix = \sprintf('@%s ', $tag);
            $linePrefix = \str_repeat(' ', \strlen($prefix));

            $lines = \explode("\n", (string)$type);
            $offset = \strlen($lines[\array_key_last($lines)]);

            $width = 80 - \strlen($prefix);
            if ($offset > ($width - 10)) {
                $formatted = $type . ' ' . "\n" . \wordwrap((string)$description, $width);
            } else {
                $formatted = \wordwrap(\ltrim($type . ' ' . $description), $width);
            }
            $formatted = \trim($formatted);

            foreach (\explode("\n", $formatted) as $i => $line) {
                yield ($i === 0 ? $prefix : $linePrefix)
                    . \str_replace("\r", '', $line)
                ;
            }
        });
    }
}
