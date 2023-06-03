<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

/**
 * @template TResult of mixed
 *
 * @template-implements SuccessfulResponseInterface<TResult>
 */
class SuccessfulResponse extends Response implements SuccessfulResponseInterface
{
    /**
     * @param TResult $result
     */
    public function __construct(
        IdInterface $id,
        protected readonly mixed $result,
    ) {
        parent::__construct($id);
    }

    public function getResult(): mixed
    {
        return $this->result;
    }
}
