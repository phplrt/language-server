<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Message\IdFactory;

use Phplrt\LanguageServer\RPC\Exception\IdExceptionInterface;
use Phplrt\LanguageServer\RPC\Message\IdInterface;

interface GeneratorInterface
{
    /**
     * @return IdInterface
     *
     * @throws IdExceptionInterface Occurs in case of ID creation errors.
     */
    public function generate(): IdInterface;
}
