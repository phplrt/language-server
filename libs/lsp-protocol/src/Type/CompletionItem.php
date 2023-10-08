<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A completion item represents a text snippet that is proposed to complete text
 * that is being typed.
 */
final class CompletionItem
{
    /**
     * @param string $label The label of this completion item.
     *        The label property is also by default the text that is inserted
     *        when selecting this completion.
     *        If label details are provided the label itself should be an
     *        unqualified name of the completion item.
     * @param ?CompletionItemLabelDetails $labelDetails Additional details for
     *        the label.
     *        - {@since 3.17.0}
     * @param ?CompletionItemKind $kind The kind of this completion item. Based
     *        of the kind an icon is chosen by the editor.
     * @param ?list<TextEdit> $tags Tags for this completion item.
     *        - {@since 3.15.0}
     * @param ?string $detail A human-readable string with additional
     *        information about this item, like type or symbol information.
     * @param string|MarkupContent|null $documentation A human-readable
     *        string that represents a doc-comment.
     * @param ?bool $deprecated Indicates if this item is deprecated.
     *        - {@deprecated Use `$tags` instead}.
     * @param ?bool $preselect Select this item when showing.
     *        *Note* that only one completion item can be selected and that the
     *        tool / client decides which item that is. The rule is that the
     *        *first* item of those that match best is selected.
     * @param ?string $sortText A string that should be used when comparing
     *        this item with other items. When `falsy` the
     *        {@see CompletionItem::$label} label is used.
     * @param ?string $filterText A string that should be used when filtering
     *        a set of completion items. When `falsy` the
     *        {@see CompletionItem::$label} label is used.
     * @param ?string $insertText A string that should be inserted into a
     *        document when selecting this completion. When `falsy` the
     *        {@see CompletionItem::$label} label is used.
     *        The {@see $insertText} is subject to interpretation by the
     *        client side. Some tools might not take the string literally. For
     *        example VS Code when code complete is requested in this example
     *        `con<cursor position>` and a completion item with an
     *        {@see $insertText} of {@see $console} is provided it will only
     *        insert `sole`. Therefore it is recommended to use {@see $textEdit}
     *        instead since it avoids additional client side interpretation.
     * @param ?InsertTextFormat $insertTextFormat The format of the insert text.
     *        The format applies to both the {@see $insertText} property and the
     *        {@see $newText} property of a provided {@see $textEdit}. If
     *        omitted defaults to {@see InsertTextFormat::PLAIN_TEXT}.
     *        Please note that the insertTextFormat doesn't apply to
     *        {@see $additionalTextEdits}.
     * @param ?InsertTextMode $insertTextMode How whitespace and indentation is
     *        handled during completion item insertion. If not provided the
     *        clients default value depends on the
     *        `textDocument.completion.insertTextMode` client capability.
     *        - {@since 3.16.0}
     * @param TextEdit|InsertReplaceEdit|null $textEdit An {@see TextEdit} edit
     *        which is applied to a document when selecting this completion.
     *        When an edit is provided the value of
     *        {@see CompletionItem::$insertText} insertText is ignored.
     *        Most editors support two different operations when accepting a
     *        completion item. One is to insert a completion text and the other
     *        is to replace an existing text with a completion text. Since this
     *        can usually not be predetermined by a server it can report both
     *        ranges. Clients need to signal support for {@see InsertReplaceEdits}
     *        via the `textDocument.completion.insertReplaceSupport` client
     *        capability property.
     *        *Note 1:* The text edit's range as well as both ranges from an insert
     *        replace edit must be a [single line] and they must contain the position
     *        at which completion has been requested.
     *        *Note 2:* If an `InsertReplaceEdit` is returned the edit's insert range
     *        must be a prefix of the edit's replace range, that means it must be
     *        contained and starting at the same position.
     *        - {@since 3.16.0} additional type {@see InsertReplaceEdits}
     * @param ?string $textEditText The edit text used if the completion item
     *        is part of a CompletionList and CompletionList defines an item
     *        default for the text edit range.
     *        Clients will only honor this property if they opt into completion
     *        list item defaults using the capability `completionList.itemDefaults`.
     *        If not provided and a list's default range is provided the label
     *        property is used as a text.
     *        - {@since 3.17.0}
     * @param ?list<TextEdit> $additionalTextEdits An optional array of
     *        additional {@see TextEdit} text edits that are applied when
     *        selecting this completion. Edits must not overlap (including the
     *        same insert position) with the main
     *        {@see CompletionItem::$textEdit} edit nor with themselves.
     *        Additional text edits should be used to change text unrelated to
     *        the current cursor position (for example adding an import
     *        statement at the top of the file if the completion item will
     *        insert an unqualified type).
     * @param ?list<string> $commitCharacters An optional set of characters
     *        that when pressed while this completion is active will accept it
     *        first and then type that character. *Note* that all commit
     *        characters should have `length=1` and that superfluous characters
     *        will be ignored.
     * @param ?Command $command An optional {@see Command} command that is
     *        executed *after* inserting this completion. *Note* that additional
     *        modifications to the current document should be described with the
     *        {@see CompletionItem::$additionalTextEdits} property.
     * @param mixed $data A data entry field that is preserved on a completion
     *        item between a `CompletionRequest` and a `CompletionResolveRequest`.
     */
    public function __construct(
        public readonly string $label,
        public readonly ?CompletionItemLabelDetails $labelDetails = null,
        public readonly ?CompletionItemKind $kind = null,
        public readonly ?array $tags = null,
        public readonly ?string $detail = null,
        public readonly string|MarkupContent|null $documentation = null,
        public readonly ?bool $deprecated = null,
        public readonly ?bool $preselect = null,
        public readonly ?string $sortText = null,
        public readonly ?string $filterText = null,
        public readonly ?string $insertText = null,
        public readonly ?InsertTextFormat $insertTextFormat = null,
        public readonly ?InsertTextMode $insertTextMode = null,
        public readonly TextEdit|InsertReplaceEdit|null $textEdit = null,
        public readonly ?string $textEditText = null,
        public readonly ?array $additionalTextEdits = null,
        public readonly ?array $commitCharacters = null,
        public readonly ?Command $command = null,
        public readonly mixed $data = null,
    ) {}
}
