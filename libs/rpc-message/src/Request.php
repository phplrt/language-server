<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

use Phplrt\Contracts\RPC\Message\IdInterface;
use Phplrt\Contracts\RPC\Message\RequestInterface;

class Request extends Notification implements RequestInterface
{
    /**
     * @param non-empty-string $method
     * @param array<array-key, mixed> $parameters
     */
    public function __construct(
        protected readonly IdInterface $id,
        string $method,
        array $parameters = [],
    ) {
        parent::__construct($method, $parameters);
    }

    public function getId(): IdInterface
    {
        return $this->id;
    }
}
