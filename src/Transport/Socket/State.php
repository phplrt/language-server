<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Transport\Socket;

/**
 * @internal This is an internal class, please do not use it in your application code.
 * @psalm-internal Phplrt\LanguageServer\Transport\Socket
 */
enum State
{
    case PARSE_HEADERS;
    case PARSE_BODY;

    public function next(): self
    {
        if ($this === self::PARSE_HEADERS) {
            return self::PARSE_BODY;
        }

        return self::PARSE_HEADERS;
    }

    public static function default(): self
    {
        return self::PARSE_HEADERS;
    }
}
