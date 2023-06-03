<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

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

