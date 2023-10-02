<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * The result of a hover request.
 */
final class Hover
{
    /**
     * @param MarkupContent|MarkedString|list<MarkedString|string>|string $contents
     *        The hover's content.
     * @param Range|null $range An optional range inside the text document that
     *        is used to visualize the hover, e.g. by changing the background
     *        color.
     */
    public function __construct(
        public readonly MarkupContent|MarkedString|array|string $contents,
        public readonly ?Range $range,
    ) {}
}
