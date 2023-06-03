<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Message;

final class NullIdentifier implements IdInterface
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
