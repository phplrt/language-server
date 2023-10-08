<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\CallHierarchy;

use Phplrt\LanguageServer\Protocol\CallHierarchy\CallHierarchyItem;
use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * Represents an incoming call, e.g. a caller of a method or constructor.
 *
 * @since 3.16.0
 */
final class CallHierarchyIncomingCall
{
    /**
     * @param CallHierarchyItem $from The item that makes the call.
     * @param list<Range> $fromRanges The ranges at which the calls appear.
     *        This is relative to the caller denoted by {@see $from}.
     */
    public function __construct(
        public readonly CallHierarchyItem $from,
        public readonly array $fromRanges,
    ) {}
}
