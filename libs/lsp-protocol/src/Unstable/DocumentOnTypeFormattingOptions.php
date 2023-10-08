<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * Provider options for a {@link DocumentOnTypeFormattingRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class DocumentOnTypeFormattingOptions
{
    /**
     * @param string $firstTriggerCharacter A character on which formatting
     *        should be triggered, like `{`.
     * @param ?list<string> $moreTriggerCharacter More trigger characters.
     */
    public function __construct(
        public readonly string $firstTriggerCharacter,
        public readonly ?array $moreTriggerCharacter = null,
    ) {}
}
