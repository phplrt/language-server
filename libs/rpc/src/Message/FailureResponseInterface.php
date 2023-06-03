<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Message;

/**
 * When RPC call encounters an error, the {@see ResponseInterface} object MUST
 * contain the error member with a value that is an object with the
 * following members:
 *  - code
 *  - message
 *  - data
 */
interface FailureResponseInterface extends ResponseInterface
{
    /**
     * A {@see int} that indicates the error type that occurred.
     *
     * @return int
     */
    public function getErrorCode(): int;

    /**
     * A {@see string} providing a short description of the error.
     *
     * @return string
     */
    public function getErrorMessage(): string;

    /**
     * A primitive or structured value that contains additional
     * information about the error.
     */
    public function getErrorData(): mixed;
}
