<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * How a completion was triggered
 */
enum CompletionTriggerKind: int
{
    /**
     * Completion was triggered by typing an identifier (24x7 code
     * complete), manual invocation (e.g Ctrl+Space) or via API.
     */
    case INVOKED = 1;

    /**
     * Completion was triggered by a trigger character specified by
     * the `triggerCharacters` properties of the `CompletionRegistrationOptions`.
     */
    case TRIGGER_CHARACTER = 2;

    /**
     * Completion was re-triggered as current completion list is incomplete
     */
    case TRIGGER_FOR_INCOMPLETE_COMPLETIONS = 3;
}
