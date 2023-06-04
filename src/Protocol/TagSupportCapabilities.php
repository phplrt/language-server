<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

use Phplrt\LanguageServer\Protocol\Type\SymbolTag;

/**
 * The client supports tags on `SymbolInformation`. Clients supporting tags
 * have to handle unknown tags gracefully.
 *
 * @since 3.16.0
 */
final class TagSupportCapabilities
{
    /**
     * @param list<SymbolTag> $valueSet The tags supported by the client.
     */
    public function __construct(
        public readonly array $valueSet = [],
    ) {
    }
}
