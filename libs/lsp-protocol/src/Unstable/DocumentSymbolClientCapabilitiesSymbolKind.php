<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\SymbolKind;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class DocumentSymbolClientCapabilitiesSymbolKind
{
    /**
     * @param ?list<SymbolKind> $valueSet The symbol kind values the client supports.
     *        When this property exists the client also guarantees that it will handle
     *        values outside its set gracefully and falls back to a default value when
     *        unknown.
     *         If this property is not present the client only supports the symbol
     *        kinds from `File` to `Array` as defined in the initial version of the
     *        protocol.
     */
    public function __construct(
        public readonly ?array $valueSet = null,
    ) {}
}
