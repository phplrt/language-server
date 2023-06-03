<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Message;

/**
 * @template TScalar of int
 *
 * @template-implements IdInterface<TScalar>
 */
final class IntIdentifier implements IdInterface
{
    /**
     * @param TScalar $value
     */
    public function __construct(
        private readonly int $value,
    ) {
    }

    /**
     * @return TScalar
     */
    public function toPrimitive(): int
    {
        return $this->value;
    }

    public function equals(IdInterface $id): bool
    {
        // - In case of passed argument is a same object
        return $id === $this
            // - Or same instance with same value
            || ($id instanceof self && $this->value === $id->value)
            // - Or different instances contains equal values
            || (string)$this->value === (string)$id;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }
}
