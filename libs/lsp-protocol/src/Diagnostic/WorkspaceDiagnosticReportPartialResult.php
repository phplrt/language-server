<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

/**
 * A partial result for a workspace diagnostic report.
 *
 * @since 3.17.0
 */
final class WorkspaceDiagnosticReportPartialResult
{
    /**
     * @param list<WorkspaceUnchangedDocumentDiagnosticReport> $items
     */
    public function __construct(
        public readonly array $items,
    ) {}
}
