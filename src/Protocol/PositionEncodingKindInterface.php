<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * A type indicating how positions are encoded, specifically what column
 * offsets mean.
 *
 * @since 3.17.0
 */
interface PositionEncodingKindInterface
{
    /**
     * @return string
     */
    public function getEncodingName(): string;
}
