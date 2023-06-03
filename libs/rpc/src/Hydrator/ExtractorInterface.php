<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Hydrator;

interface ExtractorInterface
{
    public function extract(object $object): array;
}
