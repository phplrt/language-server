<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

/**
 * A partial result for a document diagnostic report.
 *
 * @since 3.17.0
 */
final class DocumentDiagnosticReportPartialResult
{
    /**
     * @param array<string, FullDocumentDiagnosticReport|UnchangedDocumentDiagnosticReport> $relatedDocuments
     */
    public function __construct(
        public readonly array $relatedDocuments = [],
    ) {}
}
