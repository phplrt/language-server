<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

class FailureResponse extends Response implements FailureResponseInterface
{
    public function __construct(
        IdInterface $id,
        protected readonly int $code,
        protected readonly string $message,
        protected readonly mixed $data = null,
    ) {
        parent::__construct($id);
    }

    public function getErrorCode(): int
    {
        return $this->code;
    }

    public function getErrorMessage(): string
    {
        return $this->message;
    }

    public function getErrorData(): mixed
    {
        return $this->data;
    }
}
