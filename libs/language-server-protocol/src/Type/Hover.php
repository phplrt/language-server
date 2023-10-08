<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * The result of a hover request.
 */
final class Hover
{
    /**
     * @param MarkupContent|string|HoverContents|list<string|HoverContents> $contents
     *        The hover's content
     * @param ?Range $range An optional range inside the text document that is
     *        used to visualize the hover, e.g. by changing the background color.
     */
    public function __construct(
        public readonly MarkupContent|string|HoverContents|array $contents,
        public readonly ?Range $range = null,
    ) {}
}
