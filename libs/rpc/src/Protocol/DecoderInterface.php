<?php

declare(strict_types=1);

namespace Phplrt\RPC\Protocol;

use Phplrt\RPC\Exception\DecodingExceptionInterface;
use Phplrt\RPC\Message\MessageInterface;

interface DecoderInterface
{
    /**
     * @throws DecodingExceptionInterface
     */
    public function decode(string $data): MessageInterface;
}
