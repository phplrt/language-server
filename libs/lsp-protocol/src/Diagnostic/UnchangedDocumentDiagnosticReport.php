<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

/**
 * A diagnostic report indicating that the last returned report is still accurate.
 *
 * @since 3.17.0
 */
class UnchangedDocumentDiagnosticReport
{
    /**
     * A document diagnostic report indicating no changes to the last result.
     *
     * A server can only return {@see DocumentDiagnosticReportKind::UNCHANGED}
     * if result ids are provided.
     */
    public readonly DocumentDiagnosticReportKind $kind;

    /**
     * @param string $resultId A result id which will be sent on the next
     *        diagnostic request for the same document.
     */
    public function __construct(
        public readonly string $resultId,
    ) {
        $this->kind = DocumentDiagnosticReportKind::UNCHANGED;
    }
}
