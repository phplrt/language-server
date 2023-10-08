<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\Type\Command;
use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * An inline completion item represents a text snippet that is proposed inline to
 * complete text that is being typed.
 *
 * @since 3.18.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class InlineCompletionItem
{
    /**
     * @param string|StringValue $insertText The text to replace the range
     *        with. Must be set.
     * @param ?string $filterText A text that is used to decide if this
     *        inline completion should be shown. When `falsy` the {@link
     *        InlineCompletionItem.insertText} is used.
     * @param ?Range $range The range to replace. Must begin and end on the same line.
     * @param ?Command $command An optional {@link Command} that is executed *after*
     *        inserting this completion.
     */
    public function __construct(
        public readonly string|StringValue $insertText,
        public readonly ?string $filterText = null,
        public readonly ?Range $range = null,
        public readonly ?Command $command = null,
    ) {}
}
