<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Additional details for a completion item label.
 *
 * @since 3.17.0
 */
final class CompletionItemLabelDetails
{
    /**
     * @param ?string $detail An optional string which is rendered less
     *        prominently directly after {@link CompletionItem::$label} label,
     *        without any spacing. Should be used for function signatures and
     *        type annotations.
     * @param ?string $description An optional string which is rendered less
     *        prominently after {@link CompletionItem::$detail}. Should be used
     *        for fully qualified names and file paths.
     */
    public function __construct(
        public readonly ?string $detail = null,
        public readonly ?string $description = null,
    ) {}
}
