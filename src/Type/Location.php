<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * Represents a location inside a resource, such as a line inside a text file.
 */
final class Location
{
    /**
     * @param string $uri A string property that are actually document URIs.
     * @param Range $range A range in a text document expressed as (zero-based)
     *        start and end positions.
     */
    public function __construct(
        public readonly string $uri,
        public readonly Range $range,
    ) {}
}
