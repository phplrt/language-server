<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC;

use Phplrt\LanguageServer\RPC\Message\IdInterface;

interface IdFactoryInterface
{
    /**
     * @param non-empty-string $id
     *
     * @return IdInterface
     */
    public function createFromString(string $id): IdInterface;

    /**
     * @param int $id
     *
     * @return IdInterface
     */
    public function createFromInt(int $id): IdInterface;

    /**
     * @return IdInterface
     */
    public function createFromNull(): IdInterface;
}
