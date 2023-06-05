<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

/**
 * Client capabilities specific to diagnostic pull requests.
 *
 * @since 3.17.0
 */
final class DiagnosticClientCapabilities
{
    /**
     * @param bool|null $dynamicRegistration Whether implementation supports
     *        dynamic registration. If this is set to {@see true} the client
     *        supports the new `(TextDocumentRegistrationOptions &
     *        StaticRegistrationOptions)` return value for the corresponding
     *        server capability as well.
     * @param bool|null $relatedDocumentSupport Whether the clients supports
     *        related documents for document diagnostic pulls.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $relatedDocumentSupport = null,
    ) {}
}
