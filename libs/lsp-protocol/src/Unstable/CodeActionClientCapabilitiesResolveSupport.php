<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class CodeActionClientCapabilitiesResolveSupport
{
    /**
     * @param list<string> $properties The properties that a client can
     *        resolve lazily.
     */
    public function __construct(
        public readonly array $properties,
    ) {}
}
