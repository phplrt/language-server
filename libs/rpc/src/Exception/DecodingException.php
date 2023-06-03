<?php

declare(strict_types=1);

namespace Phplrt\RPC\Exception;

class DecodingException extends \RuntimeException implements DecodingExceptionInterface
{
    final public const CODE_DECODING = 0x01;

    protected const ERROR_CODE_LAST = self::CODE_DECODING;

    final public function __construct(string $message, int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function fromInternalDecodingError(string $message, int $code = 0x00): self
    {
        $error = 'An error occurred while decoding data: (0x%04X) %s';
        $error = \sprintf($message, $code, $error);

        return new static($error, self::CODE_DECODING);
    }
}
