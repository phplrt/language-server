<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message\Factory;

use Phplrt\RPC\Message\FailureResponse;
use Phplrt\Contracts\RPC\Message\FailureResponseInterface as Failure;
use Phplrt\Contracts\RPC\Message\IdInterface as Id;
use Phplrt\Contracts\RPC\Message\RequestInterface;
use Phplrt\RPC\Message\SuccessfulResponse;
use Phplrt\Contracts\RPC\Message\SuccessfulResponseInterface as Success;

final class ResponseFactory implements ResponseFactoryInterface
{
    public function createSuccess(Id|RequestInterface $id, mixed $result): Success
    {
        if ($id instanceof RequestInterface) {
            $id = $id->getId();
        }

        return new SuccessfulResponse($id, $result);
    }

    public function createFailure(Id|RequestInterface $id, int $code, string $message, mixed $data = null): Failure
    {
        if ($id instanceof RequestInterface) {
            $id = $id->getId();
        }

        return new FailureResponse($id, $code, $message, $data);
    }

    public function createFromThrowable(Id|RequestInterface $id, \Throwable $e): Failure
    {
        return $this->createFailure($id, (int)$e->getCode(), $e->getMessage());
    }
}
