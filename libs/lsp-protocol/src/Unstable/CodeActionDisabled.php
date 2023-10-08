<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class CodeActionDisabled
{
    /**
     * @param string $reason Human readable description of why the code
     *        action is currently disabled.
     *         This is displayed in the code actions UI.
     */
    public function __construct(
        public readonly string $reason,
    ) {}
}
