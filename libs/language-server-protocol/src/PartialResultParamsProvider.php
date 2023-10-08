<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * A parameter literal used to pass a partial result token.
 *
 * @psalm-require-implements PartialResultParams
 */
trait PartialResultParamsProvider
{
    /**
     * An optional token that a server can use to report partial results (e.g.
     * streaming) to the client.
     *
     * @var int<-2147483648, 2147483647>|string|null
     */
    public int|string|null $partialResultToken = null;
}
