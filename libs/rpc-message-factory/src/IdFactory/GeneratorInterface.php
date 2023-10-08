<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message\Factory\IdFactory;

use Phplrt\RPC\Message\Factory\Exception\IdExceptionInterface;
use Phplrt\Contracts\RPC\Message\IdInterface;

interface GeneratorInterface
{
    /**
     * @throws IdExceptionInterface Occurs in case of ID creation errors.
     */
    public function nextId(): IdInterface;
}
