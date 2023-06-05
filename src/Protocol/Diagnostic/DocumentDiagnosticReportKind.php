<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

/**
 * The document diagnostic report kinds.
 *
 * @since 3.17.0
 */
enum DocumentDiagnosticReportKind: string
{
    /**
     * A diagnostic report with a full set of problems.
     */
    case FULL = 'full';

    /**
     * A report indicating that the last returned report is still accurate.
     */
    case UNCHANGED = 'unchanged';
}
