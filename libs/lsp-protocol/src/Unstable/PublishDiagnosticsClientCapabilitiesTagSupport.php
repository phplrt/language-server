<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\DiagnosticTag;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class PublishDiagnosticsClientCapabilitiesTagSupport
{
    /**
     * @param list<DiagnosticTag> $valueSet The tags supported by the client.
     */
    public function __construct(
        public readonly array $valueSet,
    ) {}
}
