<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

use Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\Completion\CompletionItem;

/**
 * Represents a collection of {@link CompletionItem} completion items to be
 * presented in the editor.
 */
final class CompletionList
{
    /**
     * @param bool $isIncomplete This list it not complete. Further typing
     *        results in recomputing this list.
     *        Recomputed lists have all their items replaced (not appended)
     *        in the incomplete completion sessions.
     * @param ?CompletionListItemDefaults $itemDefaults In many cases the items
     *        of an actual completion result share the same value for properties
     *        like `commitCharacters` or the range of a text edit. A completion
     *        list can therefore define item defaults which will be used if a
     *        completion item itself doesn't specify the value.
     *        If a completion list specifies a default value and a completion
     *        item also specifies a corresponding value the one from the item
     *        is used.
     *        Servers are only allowed to return default values if the client
     *        signals support for this via the `completionList.itemDefaults`
     *        capability.
     *        - {@since 3.17.0}
     * @param list<CompletionItem> $items The completion items.
     */
    public function __construct(
        public readonly bool $isIncomplete,
        public readonly ?CompletionListItemDefaults $itemDefaults = null,
        public readonly array $items = [],
    ) {}
}
