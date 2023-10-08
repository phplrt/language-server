<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Represents a color range from a document.
 */
final class ColorInformation
{
    /**
     * @param Range $range The range in the document where this color appears.
     * @param Color $color The actual color value for this color range.
     */
    public function __construct(
        public readonly Range $range,
        public readonly Color $color,
    ) {}
}
