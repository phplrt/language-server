<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\Type\CodeActionKind;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class CodeActionClientCapabilitiesCodeActionLiteralSupportCodeActionKind
{
    /**
     * @param list<CodeActionKind|string> $valueSet The code action kind
     *        values the client supports. When this property exists the client also
     *        guarantees that it will handle values outside its set gracefully and
     *        falls back to a default value when unknown.
     */
    public function __construct(
        public readonly array $valueSet = [],
    ) {}
}
