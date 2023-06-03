<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

final class IdFactory implements IdFactoryInterface
{
    public function createFromString(string $id): IdInterface
    {
        return new StringIdentifier($id);
    }

    public function createFromInt(int $id): IdInterface
    {
        return new IntIdentifier($id);
    }

    public function createEmpty(): IdInterface
    {
        return new EmptyIdentifier();
    }
}
