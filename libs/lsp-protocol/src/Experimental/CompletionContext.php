<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * Contains additional information about the context in which a completion request
 * is triggered.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class CompletionContext
{
    /**
     * @param CompletionTriggerKind $triggerKind How the completion was triggered.
     * @param ?string $triggerCharacter The trigger character (a single
     *        character) that has trigger code complete. Is undefined if `triggerKind
     *        !== CompletionTriggerKind.TriggerCharacter`
     */
    public function __construct(
        public readonly CompletionTriggerKind $triggerKind,
        public readonly ?string $triggerCharacter = null,
    ) {}
}
