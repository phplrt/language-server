<?php

declare(strict_types=1);

namespace Phplrt\RPC\Protocol;

use Phplrt\RPC\Protocol\Exception\DecodingExceptionInterface;
use Phplrt\Contracts\RPC\Message\MessageInterface;

interface DecoderInterface
{
    /**
     * @throws DecodingExceptionInterface
     */
    public function decode(string $data): MessageInterface;
}
