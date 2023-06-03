<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Message;

/**
 * @template TScalar of non-empty-string
 *
 * @template-implements IdInterface<TScalar>
 */
final class StringIdentifier implements IdInterface
{
    /**
     * @param TScalar $value
     */
    public function __construct(
        private readonly string $value,
    ) {
        assert($this->value !== '');
    }

    /**
     * @return TScalar
     */
    public function toPrimitive(): string
    {
        return $this->value;
    }

    public function equals(IdInterface $id): bool
    {
        return $id === $this
            || ($id instanceof self && $id->value === $this->value)
            || $this->value === (string)$id;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
