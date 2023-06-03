<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Protocol;

use Phplrt\LanguageServer\RPC\Exception\DecodingExceptionInterface;
use Phplrt\LanguageServer\RPC\Message\MessageInterface;

interface DecoderInterface
{
    /**
     * @throws DecodingExceptionInterface
     */
    public function decode(string $data): MessageInterface;
}
