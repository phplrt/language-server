<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\Completion;

final class CompletionList
{
    /**
     * @param ?list<string> $itemDefaults The client supports the following
     *        itemDefaults on a completion list.
     *        The value lists the supported property names of the
     *        `CompletionList.itemDefaults` object. If omitted no properties are
     *        supported.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly ?array $itemDefaults = null,
    ) {}
}
