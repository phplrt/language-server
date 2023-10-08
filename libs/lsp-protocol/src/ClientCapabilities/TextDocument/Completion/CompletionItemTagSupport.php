<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\Completion;

use Phplrt\LanguageServer\Protocol\Type\CompletionItemTag;

final class CompletionItemTagSupport
{
    /**
     * @param list<CompletionItemTag> $valueSet The tags supported by the client.
     */
    public function __construct(
        public readonly array $valueSet,
    ) {}
}
