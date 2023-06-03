<?php

declare(strict_types=1);

namespace Phplrt\RPC\Exception;

class EncodingException extends \RuntimeException implements EncodingExceptionInterface
{
    final public const CODE_ENCODING = 0x01;

    protected const ERROR_CODE_LAST = self::CODE_ENCODING;

    final public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function fromInternalEncodingError(string $message, int $code): self
    {
        $message = 'An error occurred while encoding data: ' . $message;

        return new static($message, self::CODE_ENCODING + $code);
    }
}
