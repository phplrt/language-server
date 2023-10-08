<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * Describes how an {@link InlineCompletionItemProvider inline completion provider}
 * was triggered.
 *
 * @since 3.18.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
enum InlineCompletionTriggerKind: int
{
    /**
     * Completion was triggered explicitly by a user gesture.
     */
    case INVOKED = 0;

    /**
     * Completion was triggered automatically while editing.
     */
    case AUTOMATIC = 1;
}
