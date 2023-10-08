<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Represents a folding range. To be valid, start and end line must be bigger than
 * zero and smaller than the number of lines in the document. Clients are free to
 * ignore invalid ranges.
 */
final class FoldingRange
{
    /**
     * @param int<0, 2147483647> $startLine The zero-based start line of the range to
     *        fold. The folded area starts after the line's last character. To be
     *        valid, the end must be zero or larger and smaller than the number of
     *        lines in the document.
     * @param ?int<0, 2147483647> $startCharacter The zero-based character offset from
     *        where the folded range starts. If not defined, defaults to the length of
     *        the start line.
     * @param int<0, 2147483647> $endLine The zero-based end line of the range to fold.
     *        The folded area ends with the line's last character. To be valid, the end
     *        must be zero or larger and smaller than the number of lines in the
     *        document.
     * @param ?int<0, 2147483647> $endCharacter The zero-based character offset before
     *        the folded range ends. If not defined, defaults to the length of the end
     *        line.
     * @param FoldingRangeKind|string|null $kind Describes the kind of the
     *        folding range such as `comment' or 'region'. The kind is used to
     *        categorize folding ranges and used by commands like 'Fold all comments'.
     *        See {@link FoldingRangeKind} for an enumeration of standardized kinds.
     * @param ?string $collapsedText The text that the client should show
     *        when the specified range is collapsed. If not defined or not supported by
     *        the client, a default will be chosen by the client.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly int $startLine,
        public readonly ?int $startCharacter = null,
        public readonly int $endLine,
        public readonly ?int $endCharacter = null,
        public readonly FoldingRangeKind|string|null $kind = null,
        public readonly ?string $collapsedText = null,
    ) {}
}
