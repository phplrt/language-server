<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Represents a location inside a resource, such as a line inside a text file.
 */
final class Location
{
    /**
     * @param string $uri
     * @param Range $range
     */
    public function __construct(
        public readonly string $uri,
        public readonly Range $range,
    ) {}
}
