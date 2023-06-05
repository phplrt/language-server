<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\UnregistrationParams\Unregistration;

final class UnregistrationParams
{
    /**
     * @param list<Unregistration> $unregisterations This should correctly be
     *        named `unregistrations`. However changing this is a breaking
     *        change and needs to wait until we deliver a 4.x version of the
     *        specification.
     */
    public function __construct(
        public readonly array $unregisterations,
    ) {}
}
