<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

use Phplrt\Contracts\RPC\Message\IdInterface;
use Phplrt\Contracts\RPC\Message\RequestInterface;
use Phplrt\Contracts\RPC\Message\ResponseInterface;

abstract class Response implements ResponseInterface
{
    public function __construct(
        protected readonly IdInterface $id,
    ) {
    }

    public function getId(): IdInterface
    {
        return $this->id;
    }

    public function forRequest(RequestInterface $request): bool
    {
        return $this->id->equals($request->getId());
    }
}

