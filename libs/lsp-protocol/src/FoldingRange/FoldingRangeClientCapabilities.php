<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FoldingRange;

final class FoldingRangeClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether implementation supports dynamic
     *        registration for folding range providers. If this is set to {@see true} the
     *        client supports the new
     *        `FoldingRangeRegistrationOptions` return value for the corresponding
     *        server capability as well.
     * @param ?int<0, 2147483647> $rangeLimit The maximum number of folding ranges that
     *        the client prefers to receive per document. The value serves as a hint,
     *        servers are free to follow the limit.
     * @param ?bool $lineFoldingOnly If set, the client signals that it only supports
     *        folding complete lines. If set, client will ignore specified
     *        {@see $startCharacter} and {@see $endCharacter} properties in a FoldingRange.
     * @param ?ClientCapabilitiesFoldingRangeKind $foldingRangeKind
     *        Specific options for the folding range kind.
     *        - {@since 3.17.0}
     * @param ?ClientCapabilitiesFoldingRange $foldingRange Specific
     *        options for the folding range.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?int $rangeLimit = null,
        public readonly ?bool $lineFoldingOnly = null,
        public readonly ?ClientCapabilitiesFoldingRangeKind $foldingRangeKind = null,
        public readonly ?ClientCapabilitiesFoldingRange $foldingRange = null,
    ) {}
}
