<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

use Phplrt\RPC\Message\FailureResponseInterface as Failure;
use Phplrt\RPC\Message\IdInterface as Id;
use Phplrt\RPC\Message\SuccessfulResponseInterface as Success;

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
