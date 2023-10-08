<?php

declare(strict_types=1);

namespace Phplrt\Contracts\RPC\Message;

interface IdentifiableInterface
{
    /**
     * @return IdInterface
     */
    public function getId(): IdInterface;
}
