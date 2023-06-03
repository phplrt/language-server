<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

use Phplrt\RPC\Message\FailureResponseInterface as Failure;
use Phplrt\RPC\Message\IdInterface as Id;
use Phplrt\RPC\Message\RequestInterface as Identifiable;
use Phplrt\RPC\Message\SuccessfulResponseInterface as Success;

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
