<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * Represents a collection of {@link CompletionItem} completion items to be
 * presented in the editor.
 */
final class CompletionList
{
    /**
     * @param bool $isIncomplete This list it not complete. Further typing
     *        results in recomputing this list.
     *
     *        Recomputed lists have all their items replaced (not appended) in
     *        the incomplete completion sessions.
     * @param CompletionListItemDefaults|null $itemDefaults  A completion list
     *        can therefore define item defaults which will be used if a
     *        completion item itself doesn't specify the value.
     *        - @since 3.17.0
     * @param list<CompletionItem> $items The completion items.
     */
    public function __construct(
        public readonly bool $isIncomplete,
        public readonly ?CompletionListItemDefaults $itemDefaults = null,
        public readonly array $items = [],
    ) {}
}
