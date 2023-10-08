<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Moniker;

/**
 * Moniker definition to match LSIF 0.5 moniker definition.
 *
 * @since 3.16.0
 */
final class Moniker
{
    /**
     * @param string $scheme The scheme of the moniker.
     *        For example `tsc` or `.Net`
     * @param string $identifier The identifier of the moniker. The value is
     *        opaque in LSIF however schema owners are allowed to define the
     *        structure if they want.
     * @param UniquenessLevel $unique The scope in which the moniker is unique
     * @param ?MonikerKind $kind The moniker kind if known.
     */
    public function __construct(
        public readonly string $scheme,
        public readonly string $identifier,
        public readonly UniquenessLevel $unique,
        public readonly ?MonikerKind $kind = null,
    ) {}
}
