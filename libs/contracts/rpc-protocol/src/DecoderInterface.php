<?php

declare(strict_types=1);

namespace Phplrt\Contracts\RPC\Protocol;

use Phplrt\Contracts\RPC\Protocol\Exception\DecodingExceptionInterface;
use Phplrt\Contracts\RPC\Message\MessageInterface;

interface DecoderInterface
{
    /**
     * @throws DecodingExceptionInterface An error occurred while decoding raw
     *         data into the message instance.
     */
    public function decode(string $data): MessageInterface;
}
