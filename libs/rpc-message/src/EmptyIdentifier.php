<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

use Phplrt\Contracts\RPC\Message\IdInterface;

final class EmptyIdentifier implements IdInterface
{
    public function equals(IdInterface $id): bool
    {
        // Is same instance
        return $this === $id
            // Or same class
            || $id::class === self::class
            // Or same value
            || $id->toPrimitive() === null
        ;
    }

    public function toPrimitive(): mixed
    {
        return null;
    }

    public function __toString(): string
    {
        return '<null>';
    }
}
