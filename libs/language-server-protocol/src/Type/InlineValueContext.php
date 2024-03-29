<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * @since 3.17.0
 */
final class InlineValueContext
{
    /**
     * @param int<-2147483648, 2147483647> $frameId The stack frame (as a DAP Id) where
     *        the execution has stopped.
     * @param Range $stoppedLocation The document range where execution has stopped.
     *        Typically the end position of the range denotes the line where the inline
     *        values are shown.
     */
    public function __construct(
        public readonly int $frameId,
        public readonly Range $stoppedLocation,
    ) {}
}
