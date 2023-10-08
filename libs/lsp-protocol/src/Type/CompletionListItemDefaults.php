<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

final class CompletionListItemDefaults
{
    /**
     * @param ?list<string> $commitCharacters A default commit character set.
     *        - {@since 3.17.0}
     * @param Range|CompletionListItemDefaultsEditRange|null $editRange
     *        A default edit range.
     *        - {@since 3.17.0}
     * @param ?InsertTextFormat $insertTextFormat A default insert text format.
     *        - {@since 3.17.0}
     * @param ?InsertTextMode $insertTextMode A default insert text mode.
     *        - {@since 3.17.0}
     * @param mixed $data A default data value.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly ?array $commitCharacters = null,
        public readonly Range|CompletionListItemDefaultsEditRange|null $editRange = null,
        public readonly ?InsertTextFormat $insertTextFormat = null,
        public readonly ?InsertTextMode $insertTextMode = null,
        public readonly mixed $data = null,
    ) {}
}
