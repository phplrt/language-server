<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlayHint;

final class InlayHintClientCapabilitiesResolveSupport
{
    /**
     * @param list<string> $properties The properties that a client can
     *        resolve lazily.
     */
    public function __construct(
        public readonly array $properties,
    ) {}
}
