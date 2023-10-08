<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

use Phplrt\LanguageServer\Protocol\Type\Diagnostic;

/**
 * A full document diagnostic report for a workspace diagnostic result.
 *
 * @since 3.17.0
 */
final class WorkspaceFullDocumentDiagnosticReport extends FullDocumentDiagnosticReport
{
    /**
     * @param string $uri The URI for which diagnostic information is
     *        reported.
     * @param int<-2147483648, 2147483647>|null $version The version number for
     *        which the diagnostics are reported. If the document is not marked
     *        as open {@see null} can be provided.
     * @param ?string $resultId An optional result id. If provided it will be
     *        sent on the next diagnostic request for the same document.
     * @param list<Diagnostic> $items The actual items.
     */
    public function __construct(
        public readonly string $uri,
        public readonly int|null $version,
        ?string $resultId = null,
        array $items = [],
    ) {
        parent::__construct($resultId, $items);
    }
}
