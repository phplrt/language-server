<?php

declare(strict_types=1);

namespace Phplrt\Contracts\RPC\Protocol;

use Phplrt\Contracts\RPC\Protocol\Exception\EncodingExceptionInterface;
use Phplrt\Contracts\RPC\Message\MessageInterface;

interface EncoderInterface
{
    /**
     * @throws EncodingExceptionInterface An error occurred while encoding
     *         message into the raw data payload.
     */
    public function encode(MessageInterface $message): string;
}
