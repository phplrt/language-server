<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC;

use Phplrt\LanguageServer\RPC\Message\SuccessfulResponseInterface as Success;
use Phplrt\LanguageServer\RPC\Message\IdInterface as Id;
use Phplrt\LanguageServer\RPC\Message\RequestInterface as Identifiable;
use Phplrt\LanguageServer\RPC\Message\FailureResponseInterface as Failure;

interface ResponseFactoryInterface
{
    /**
     * @template TResult of mixed
     *
     * @param TResult $result
     *
     * @return Success<TResult>
     */
    public function createSuccess(Id|Identifiable $id, mixed $result): Success;

    /**
     * @return Failure
     */
    public function createFailure(Id|Identifiable $id, int $code, string $message, mixed $data = null): Failure;
}
