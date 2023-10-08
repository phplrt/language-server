<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

use Phplrt\LanguageServer\Protocol\Type\Diagnostic;

/**
 * A full diagnostic report with a set of related documents.
 *
 * @since 3.17.0
 */
final class RelatedFullDocumentDiagnosticReport extends FullDocumentDiagnosticReport
{
    /**
     * @param ?array<string, FullDocumentDiagnosticReport|UnchangedDocumentDiagnosticReport> $relatedDocuments
     *        Diagnostics of related documents. This information is useful in
     *        programming languages where code in a file A can generate
     *        diagnostics in a file B which A depends on. An example of such
     *        a language is C/C++ where marco definitions in a file a.cpp and
     *        result in errors in a header file b.hpp.
     *        - {@since 3.17.0}
     * @param ?string $resultId An optional result id. If provided it will be
     *        sent on the next diagnostic request for the same document.
     * @param list<Diagnostic> $items The actual items.
     */
    public function __construct(
        public readonly ?array $relatedDocuments = null,
        ?string $resultId = null,
        array $items = [],
    ) {
        parent::__construct($resultId, $items);
    }
}
