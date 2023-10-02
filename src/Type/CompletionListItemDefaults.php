<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * In many cases the items of an actual completion result share the same
 * value for properties like `commitCharacters` or the range of a text
 * edit. A completion list can therefore define item defaults which will
 * be used if a completion item itself doesn't specify the value.
 *
 * If a completion list specifies a default value and a completion item
 * also specifies a corresponding value the one from the item is used.
 *
 * Servers are only allowed to return default values if the client
 * signals support for this via the `completionList.itemDefaults`
 * capability.
 *
 * @since 3.17.0
 */
final class CompletionListItemDefaults
{
    /**
     * @param list<string>|null $commitCharacters A default commit character set.
     *        - @since 3.17.0
     * @param Range|EditRange|null $editRange A default edit range.
     *        - @since 3.17.0
     * @param InsertTextFormat|null $insertTextFormat A default insert text
     *        format.
     *        - @since 3.17.0
     * @param InsertTextMode|null $insertTextMode A default insert text mode.
     *        - @since 3.17.0
     * @param mixed $data A default data value.
     *        - @since 3.17.0
     */
    public function __construct(
        public readonly ?array $commitCharacters = null,
        public readonly Range|EditRange|null $editRange = null,
        public readonly ?InsertTextFormat $insertTextFormat = null,
        public readonly ?InsertTextMode $insertTextMode = null,
        public readonly mixed $data = null,
    ) {}
}
