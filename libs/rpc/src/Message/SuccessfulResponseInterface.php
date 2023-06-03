<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Message;

/**
 * @template TResult of mixed
 */
interface SuccessfulResponseInterface extends ResponseInterface
{
    /**
     * @return TResult
     */
    public function getResult(): mixed;
}
