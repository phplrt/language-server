<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Exception;

class IdNotSupportedException extends IdException
{
    final public const ERROR_CODE_INVALID_PLATFORM = 0x01 + parent::ERROR_CODE_LAST;

    protected const ERROR_CODE_LAST = self::ERROR_CODE_INVALID_PLATFORM;

    /**
     * @param non-empty-string $expected
     * @param non-empty-string $actual
     * @return static
     */
    public static function fromInvalidPlatform(string $expected, string $actual): self
    {
        $message = 'The current platform does not support %s identifiers, only %s is allowed';

        return new static(\sprintf($message, $expected, $actual), self::ERROR_CODE_INVALID_PLATFORM);
    }
}
