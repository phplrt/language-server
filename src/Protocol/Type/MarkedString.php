<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * The {@see MarkedString} can be used to render human readable text. It is
 * either a markdown string or a code-block that provides a language and a code
 * snippet. The language identifier is semantically equal to the optional
 * language identifier in fenced code blocks in GitHub issues.
 *
 * @link https://help.github.com/articles/creating-and-highlighting-code-blocks/#syntax-highlighting
 *
 * The pair of a language and a value is an equivalent to markdown:
 * ```${language}
 * ${value}
 * ```
 *
 * Note that markdown strings will be sanitized - that means html will be escaped.
 *
 * @deprecated use {@see MarkupContent} instead.
 */
final class MarkedString
{
    /**
     * @param string $language
     * @param string $value
     */
    public function __construct(
        public readonly string $language,
        public readonly string $value,
    ) {
    }
}
