<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC;

use Phplrt\LanguageServer\RPC\Message\IdInterface;
use Phplrt\LanguageServer\RPC\Message\IntIdentifier;
use Phplrt\LanguageServer\RPC\Message\NullIdentifier;
use Phplrt\LanguageServer\RPC\Message\StringIdentifier;

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

    public function createFromNull(): IdInterface
    {
        return new NullIdentifier();
    }
}
