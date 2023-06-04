<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * @internal Please use {@see CodeActionKind::create()} to
 *           create {@see CodeActionKind} instance.
 * @psalm-internal Phplrt\LanguageServer\Protocol\Type
 */
final class UserCodeActionKind implements CodeActionKindInterface
{
    public function __construct(
        private readonly string $name,
    ) {
    }

    public function getActionName(): string
    {
        return $this->name;
    }
}
