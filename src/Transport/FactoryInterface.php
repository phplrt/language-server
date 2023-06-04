<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Transport;

interface FactoryInterface
{
    /**
     * @param non-empty-string $dsn
     */
    public function create(string $dsn): TransportInterface;
}
