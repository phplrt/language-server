<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A {@see MarkupContent} literal represents a string value which content is
 * interpreted base on its kind flag. Currently the protocol supports
 * `plaintext` and `markdown` as markup kinds.
 *
 * If the kind is `markdown` then the value can contain fenced code blocks like
 * in GitHub issues.
 *
 * @link https://help.github.com/articles/creating-and-highlighting-code-blocks/#syntax-highlighting
 *
 * Here is an example how such a string can be constructed:
 * ```php
 * new MarkdownContent(
 *    kind: MarkupKind::MARKDOWN,
 *    value: <<<'TXT'
 *        # Header
 *        Some text
 *        ```php
 *        echo $object->someCode();
 *        ```
 *        TXT,
 * );
 * ```
 *
 * *Please Note* that clients might sanitize the return markdown. A client could
 * decide to remove HTML from the markdown to avoid script execution.
 */
final class MarkupContent
{
    /**
     * @param MarkupKind $kind The type of the Markup.
     * @param string $value The content itself.
     */
    public function __construct(
        public readonly MarkupKind $kind,
        public readonly string $value,
    ) {
    }
}
