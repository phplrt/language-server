<?php

declare(strict_types=1);

namespace Phplrt\Contracts\RPC\Message\Factory;

use Phplrt\Contracts\RPC\Message\IdInterface;

interface IdFactoryInterface
{
    public function createFromString(string $id): IdInterface;

    public function createFromInt(int $id): IdInterface;

    public function createEmpty(): IdInterface;
}
