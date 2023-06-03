<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Protocol;

use Phplrt\LanguageServer\RPC\Exception\EncodingExceptionInterface;
use Phplrt\LanguageServer\RPC\Message\MessageInterface;

interface EncoderInterface
{
    /**
     * @throws EncodingExceptionInterface
     */
    public function encode(MessageInterface $message): string;
}
