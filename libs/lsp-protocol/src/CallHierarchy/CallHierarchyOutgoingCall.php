<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\CallHierarchy;

use Phplrt\LanguageServer\Protocol\Type\CallHierarchyItem;
use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * Represents an outgoing call, e.g. calling a getter from a method or a method
 * from a constructor etc.
 *
 * @since 3.16.0
 */
final class CallHierarchyOutgoingCall
{
    /**
     * @param CallHierarchyItem $to The item that is called.
     * @param list<Range> $fromRanges The range at which this item is called.
     *        This is the range relative to the caller.
     */
    public function __construct(
        public readonly CallHierarchyItem $to,
        public readonly array $fromRanges,
    ) {}
}
