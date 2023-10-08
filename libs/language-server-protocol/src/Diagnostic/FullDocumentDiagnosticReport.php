<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

use Phplrt\LanguageServer\Protocol\Type\Diagnostic;

/**
 * A diagnostic report with a full set of problems.
 *
 * @since 3.17.0
 */
class FullDocumentDiagnosticReport
{
    /**
     * A full document diagnostic report.
     *
     * Can be only {@see DocumentDiagnosticReportKind::FULL}.
     */
    public readonly DocumentDiagnosticReportKind $kind;

    /**
     * @param ?string $resultId An optional result id. If provided it will be
     *        sent on the next diagnostic request for the same document.
     * @param list<Diagnostic> $items The actual items.
     */
    public function __construct(
        public readonly ?string $resultId = null,
        public readonly array $items = [],
    ) {
        $this->kind = DocumentDiagnosticReportKind::FULL;
    }
}
