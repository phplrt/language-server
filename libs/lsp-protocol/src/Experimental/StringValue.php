<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * A string value used as a snippet is a template which allows to insert text and
 * to control the editor cursor when insertion happens.
 *  A snippet can define tab stops and placeholders with `$1`, `$2` and `${3:foo}`.
 * `$0` defines the final tab stop, it defaults to the end of the snippet.
 * Variables are defined with `$name` and
 * `${name:default value}`.
 *
 * @since 3.18.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class StringValue
{
    /**
     * @param snippet $kind The kind of string value.
     * @param string $value The snippet string.
     */
    public function __construct(
        public readonly snippet $kind,
        public readonly string $value,
    ) {}
}
