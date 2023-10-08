<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Defines whether the insert text in a completion item should be interpreted as
 * plain text or a snippet.
 */
enum InsertTextFormat: int
{
    /**
     * The primary text to be inserted is treated as a plain string.
     */
    case PLAIN_TEXT = 1;

    /**
     * The primary text to be inserted is treated as a snippet.
     *
     * A snippet can define tab stops and placeholders with `$1`, `$2` and
     * `${3:foo}`. `$0` defines the final tab stop, it defaults to the end of
     * the snippet. Placeholders with equal identifiers are linked, that is
     * typing in one will update others too.
     *
     * See also:
     * {@link https://microsoft.github.io/language-server-protocol/specifications/specification-current/#snippet_syntax}
     */
    case SNIPPET = 2;
}
