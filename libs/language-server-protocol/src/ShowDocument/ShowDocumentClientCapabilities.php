<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ShowDocument;

/**
 * Client capabilities for the showDocument request.
 *
 * @since 3.16.0
 */
final class ShowDocumentClientCapabilities
{
    /**
     * @param bool $support The client has support for the showDocument request.
     */
    public function __construct(
        public readonly bool $support,
    ) {}
}
