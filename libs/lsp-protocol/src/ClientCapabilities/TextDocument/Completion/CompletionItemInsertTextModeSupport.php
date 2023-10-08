<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\Completion;

use Phplrt\LanguageServer\Protocol\Type\InsertTextMode;

final class CompletionItemInsertTextModeSupport
{
    /**
     * @param list<InsertTextMode> $valueSet
     */
    public function __construct(
        public readonly array $valueSet,
    ) {}
}
