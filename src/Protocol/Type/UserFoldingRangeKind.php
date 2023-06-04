<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * @internal Please use {@see FoldingRangeKind::create()} to
 *           create {@see UserFoldingRangeKind} instance.
 * @psalm-internal Phplrt\LanguageServer\Protocol\Type
 */
final class UserFoldingRangeKind implements FoldingRangeKindInterface
{
    public function __construct(
        private readonly string $name,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
