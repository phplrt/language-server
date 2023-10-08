<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

/**
 * An unchanged document diagnostic report for a workspace diagnostic result.
 *
 * @since 3.17.0
 */
final class WorkspaceUnchangedDocumentDiagnosticReport extends UnchangedDocumentDiagnosticReport
{
    /**
     * @param string $uri The URI for which diagnostic information is
     *        reported.
     * @param int<-2147483648, 2147483647>|null $version The version number for which
     *        the diagnostics are reported. If the document is not marked as open
     *        {@see null} can be provided.
     * @param string $resultId A result id which will be sent on the next
     *        diagnostic request for the same document.
     */
    public function __construct(
        public readonly string $uri,
        public readonly int|null $version,
        string $resultId,
    ) {
        parent::__construct($resultId);
    }
}
