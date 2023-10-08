<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\Type\WorkspaceFolder;

/**
 * A relative pattern is a helper to construct glob patterns that are matched
 * relatively to a base URI. The common value for a {@see $baseUri} is a
 * workspace folder root, but it can be another absolute URI as well.
 *
 * @since 3.17.0
 */
class RelativePattern
{
    /**
     * @param WorkspaceFolder|string $baseUri A workspace folder or a base
     *        URI to which this pattern will be matched against relatively.
     * @param string $pattern The actual glob pattern;
     */
    public function __construct(
        public readonly WorkspaceFolder|string $baseUri,
        public readonly string $pattern,
    ) {}
}
