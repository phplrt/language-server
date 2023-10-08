<?php

declare(strict_types=1);

namespace Phplrt\Contracts\RPC\Hydrator;

interface ExtractorInterface
{
    public function extract(object $object): array;
}
