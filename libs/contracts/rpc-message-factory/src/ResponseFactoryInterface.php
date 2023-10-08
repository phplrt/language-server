<?php

declare(strict_types=1);

namespace Phplrt\Contracts\RPC\Message\Factory;

use Phplrt\Contracts\RPC\Message\FailureResponseInterface as Failure;
use Phplrt\Contracts\RPC\Message\IdInterface as Id;
use Phplrt\Contracts\RPC\Message\RequestInterface as Identifiable;
use Phplrt\Contracts\RPC\Message\SuccessfulResponseInterface as Success;

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

    public function createFailure(Id|Identifiable $id, int $code, string $message, mixed $data = null): Failure;
}
