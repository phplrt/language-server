<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message\IdFactory;

use Phplrt\RPC\Message\Exception\IdExceptionInterface;
use Phplrt\RPC\Message\IdInterface;

interface GeneratorInterface
{
    /**
     * @return IdInterface
     *
     * @throws IdExceptionInterface Occurs in case of ID creation errors.
     */
    public function nextId(): IdInterface;
}
