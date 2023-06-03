<?php

declare(strict_types=1);

namespace Phplrt\RPC\Protocol;

use Phplrt\RPC\Exception\EncodingExceptionInterface;
use Phplrt\RPC\Message\MessageInterface;

interface EncoderInterface
{
    /**
     * @throws EncodingExceptionInterface
     */
    public function encode(MessageInterface $message): string;
}
