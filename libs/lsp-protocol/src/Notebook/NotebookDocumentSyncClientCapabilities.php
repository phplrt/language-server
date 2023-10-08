<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * Notebook specific client capabilities.
 *
 * @since 3.17.0
 */
final class NotebookDocumentSyncClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether implementation supports dynamic
     *        registration. If this is set to {@see true} the client supports the new
     *        `(TextDocumentRegistrationOptions & StaticRegistrationOptions)` return
     *        value for the corresponding server capability as well.
     * @param ?bool $executionSummarySupport The client supports sending execution
     *        summary data per cell.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $executionSummarySupport = null,
    ) {}
}
