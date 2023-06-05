<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Symbol;

use Phplrt\LanguageServer\Type\SymbolKind;

/**
 * Specific capabilities for the {@see SymbolKind} in the `workspace/symbol`
 * request.
 */
final class SymbolKindCapabilities
{
    /**
     * @param list<SymbolKind>|null $valueSet The symbol kind values the client
     *        supports. When this property exists the client also guarantees
     *        that it will handle values outside its set gracefully and falls
     *        back to a default value when unknown.
     *
     *        If this property is not present the client only supports the
     *        symbol kinds from {@see SymbolKind::FILE} to {@see SymbolKind::ARRAY}
     *        as defined in the initial version of the protocol.
     */
    public function __construct(
        public readonly ?array $valueSet = null,
    ) {}
}
