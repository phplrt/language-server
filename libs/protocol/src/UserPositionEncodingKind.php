<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * @internal Please use {@see PositionEncodingKind::create()} to
 *           create {@see PositionEncodingKind} instance.
 * @psalm-internal Phplrt\LanguageServer\Type
 */
final class UserPositionEncodingKind implements PositionEncodingKindInterface
{
    public function __construct(
        private readonly string $name,
    ) {}

    public function getEncodingName(): string
    {
        return $this->name;
    }
}
