<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Hydrator;

interface HydratorInterface
{
    /**
     * @template TObject of object
     *
     * @param class-string<TObject> $type
     * @param array<non-empty-string, mixed> $data
     *
     * @return TObject
     */
    public function hydrate(string $type, array $data): object;
}
