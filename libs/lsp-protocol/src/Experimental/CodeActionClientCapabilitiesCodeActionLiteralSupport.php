<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class CodeActionClientCapabilitiesCodeActionLiteralSupport
{
    /**
     * @param CodeActionClientCapabilitiesCodeActionLiteralSupportCodeActionKind $codeActionKind
     *        The code action kind is support with the following value set.
     */
    public function __construct(
        public readonly CodeActionClientCapabilitiesCodeActionLiteralSupportCodeActionKind $codeActionKind,
    ) {}
}
