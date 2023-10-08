<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookDocumentSyncClientCapabilities;

/**
 * Capabilities specific to the notebook document support.
 *
 * @since 3.17.0
 */
final class NotebookDocumentClientCapabilities
{
    /**
     * @param NotebookDocumentSyncClientCapabilities $synchronization Capabilities
     *        specific to notebook document synchronization
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly NotebookDocumentSyncClientCapabilities $synchronization,
    ) {}
}
