<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Represents a color in RGBA space.
 */
final class Color
{
    /**
     * @param float $red The red component of this color in the range [0-1].
     * @param float $green The green component of this color in the range [0-1].
     * @param float $blue The blue component of this color in the range [0-1].
     * @param float $alpha The alpha component of this color in the range [0-1].
     */
    public function __construct(
        public readonly float $red,
        public readonly float $green,
        public readonly float $blue,
        public readonly float $alpha,
    ) {}
}
