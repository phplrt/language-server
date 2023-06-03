<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message;

interface IdentifiableInterface
{
    /**
     * @return IdInterface
     */
    public function getId(): IdInterface;
}
