<?php

declare(strict_types=1);

namespace Phplrt\RPC\Protocol;

use Phplrt\RPC\Protocol\Exception\EncodingExceptionInterface;
use Phplrt\Contracts\RPC\Message\MessageInterface;

interface EncoderInterface
{
    /**
     * @throws EncodingExceptionInterface
     */
    public function encode(MessageInterface $message): string;
}
