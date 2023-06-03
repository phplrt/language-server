<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

interface IdFactoryInterface
{
    /**
     * @param non-empty-string $id
     *
     * @return IdInterface
     */
    public function createFromString(string $id): IdInterface;

    /**
     * @param int $id
     *
     * @return IdInterface
     */
    public function createFromInt(int $id): IdInterface;

    /**
     * @return IdInterface
     */
    public function createEmpty(): IdInterface;
}
