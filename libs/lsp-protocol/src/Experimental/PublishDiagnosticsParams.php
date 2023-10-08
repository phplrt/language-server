<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\Type\Diagnostic;

/**
 * The publish diagnostic notification's parameters.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class PublishDiagnosticsParams
{
    /**
     * @param string $uri The URI for which diagnostic information is
     *        reported.
     * @param ?int<-2147483648, 2147483647> $version Optional the version number of the
     *        document the diagnostics are published for.
     *        - {@since 3.15.0}
     * @param list<Diagnostic> $diagnostics An array of diagnostic information items.
     */
    public function __construct(
        public readonly string $uri,
        public readonly ?int $version = null,
        public readonly array $diagnostics,
    ) {}
}
