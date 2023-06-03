<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Message;

interface IdentifiableInterface
{
    /**
     * @return IdInterface
     */
    public function getId(): IdInterface;
}
