<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC;

use Phplrt\LanguageServer\RPC\Message\FailureResponse;
use Phplrt\LanguageServer\RPC\Message\RequestInterface;
use Phplrt\LanguageServer\RPC\Message\SuccessfulResponse;
use Phplrt\LanguageServer\RPC\Message\SuccessfulResponseInterface as Success;
use Phplrt\LanguageServer\RPC\Message\IdInterface as Id;
use Phplrt\LanguageServer\RPC\Message\RequestInterface as Identifiable;
use Phplrt\LanguageServer\RPC\Message\FailureResponseInterface as Failure;

final class ResponseFactory implements ResponseFactoryInterface
{
    public function createSuccess(Id|Identifiable $id, mixed $result): Success
    {
        if ($id instanceof RequestInterface) {
            $id = $id->getId();
        }

        return new SuccessfulResponse($id, $result);
    }

    public function createFailure(Id|Identifiable $id, int $code, string $message, mixed $data = null): Failure
    {
        if ($id instanceof RequestInterface) {
            $id = $id->getId();
        }

        return new FailureResponse($id, $code, $message, $data);
    }

    public function createFromThrowable(Id|Identifiable $id, \Throwable $e): Failure
    {
        return $this->createFailure($id, (int)$e->getCode(), $e->getMessage());
    }
}
