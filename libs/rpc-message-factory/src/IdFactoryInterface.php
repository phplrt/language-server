<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message\Factory;

use Phplrt\RPC\Message\IdInterface;

interface IdFactoryInterface
{
    public function createFromString(string $id): IdInterface;

    public function createFromInt(int $id): IdInterface;

    public function createEmpty(): IdInterface;
}
