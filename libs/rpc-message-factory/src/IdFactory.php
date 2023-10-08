<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message\Factory;

use Phplrt\RPC\Message\EmptyIdentifier;
use Phplrt\RPC\Message\IdInterface;
use Phplrt\RPC\Message\IntIdentifier;
use Phplrt\RPC\Message\StringIdentifier;

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
