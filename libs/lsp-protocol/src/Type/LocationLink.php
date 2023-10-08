<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Represents the connection of two locations. Provides additional metadata over
 * normal {@see Location} locations, including an origin range.
 */
final class LocationLink
{
    /**
     * @param ?Range $originSelectionRange Span of the origin of this link.
     *         Used as the underlined span for mouse interaction. Defaults to the word
     *        range at the definition position.
     * @param string $targetUri The target resource identifier of this link.
     * @param Range $targetRange The full target range of this link. If the target for
     *        example is a symbol then target range is the range enclosing this symbol
     *        not including leading/trailing whitespace but everything else like
     *        comments. This information is typically used to highlight the range in
     *        the editor.
     * @param Range $targetSelectionRange The range that should be selected and
     *        revealed when this link is being followed, e.g the name of a function.
     *        Must be contained by the {@see $targetRange}. See also `DocumentSymbol#range`
     */
    public function __construct(
        public readonly ?Range $originSelectionRange,
        public readonly string $targetUri,
        public readonly Range $targetRange,
        public readonly Range $targetSelectionRange,
    ) {}
}
