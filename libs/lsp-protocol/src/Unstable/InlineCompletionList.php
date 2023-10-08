<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * Represents a collection of {@link InlineCompletionItem inline completion items}
 * to be presented in the editor.
 *
 * @since 3.18.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class InlineCompletionList
{
    /**
     * @param list<InlineCompletionItem> $items The inline completion items
     */
    public function __construct(
        public readonly array $items,
    ) {}
}
