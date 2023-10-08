<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * Value-object describing what options formatting should use.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class FormattingOptions
{
    /**
     * @param int<0, 2147483647> $tabSize Size of a tab in spaces.
     * @param bool $insertSpaces Prefer spaces over tabs.
     * @param ?bool $trimTrailingWhitespace Trim trailing whitespace on a line.
     *        - {@since 3.15.0}
     * @param ?bool $insertFinalNewline Insert a newline character at the end of the
     *        file if one does not exist.
     *        - {@since 3.15.0}
     * @param ?bool $trimFinalNewlines Trim all newlines after the final newline at the
     *        end of the file.
     *        - {@since 3.15.0}
     */
    public function __construct(
        public readonly int $tabSize,
        public readonly bool $insertSpaces,
        public readonly ?bool $trimTrailingWhitespace = null,
        public readonly ?bool $insertFinalNewline = null,
        public readonly ?bool $trimFinalNewlines = null,
    ) {}
}
