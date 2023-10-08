<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * Provides information about the context in which an inline completion was
 * requested.
 *
 * @since 3.18.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class InlineCompletionContext
{
    /**
     * @param InlineCompletionTriggerKind $triggerKind Describes how the inline
     *        completion was triggered.
     * @param ?SelectedCompletionInfo $selectedCompletionInfo Provides information
     *        about the currently selected item in the autocomplete widget if it is
     *        visible.
     */
    public function __construct(
        public readonly InlineCompletionTriggerKind $triggerKind,
        public readonly ?SelectedCompletionInfo $selectedCompletionInfo = null,
    ) {}
}
