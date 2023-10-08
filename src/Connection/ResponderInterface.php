<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Connection;

use Phplrt\Contracts\RPC\Message\FailureResponseInterface;
use Phplrt\Contracts\RPC\Message\SuccessfulResponseInterface;

interface ResponderInterface
{
    public function success(SuccessfulResponseInterface $response): void;
    public function error(FailureResponseInterface $response): void;
}
