<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * The reason why code actions were requested.
 *
 * @since 3.17.0
 */
enum CodeActionTriggerKind: int
{
    /**
     * Code actions were explicitly requested by the user or by an extension.
     */
    case INVOKED = 1;

    /**
     * Code actions were requested automatically.
     *
     * This typically happens when current selection in a file changes, but can
     * also be triggered when file content changes.
     */
    case AUTOMATIC = 2;
}
