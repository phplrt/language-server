<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument\Completion;

use Phplrt\LanguageServer\Protocol\Type\CompletionItemKind;

final class CompletionItemKindValueSet
{
    /**
     * @param ?list<CompletionItemKind> $valueSet The completion item kind values the
     *        client supports. When this property exists the client also guarantees
     *        that it will handle values outside its set gracefully and falls back to a
     *        default value when unknown.
     *        If this property is not present the client only supports the completion
     *        items kinds from `Text` to `Reference` as defined in the initial version
     *        of the protocol.
     */
    public function __construct(
        public readonly ?array $valueSet = null,
    ) {}
}
