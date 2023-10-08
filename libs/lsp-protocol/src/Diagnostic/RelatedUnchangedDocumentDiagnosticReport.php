<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

/**
 * An unchanged diagnostic report with a set of related documents.
 *
 * @since 3.17.0
 */
final class RelatedUnchangedDocumentDiagnosticReport extends UnchangedDocumentDiagnosticReport
{
    /**
     * @param string $resultId A result id which will be sent on the next
     *        diagnostic request for the same document.
     * @param ?array<string, FullDocumentDiagnosticReport|UnchangedDocumentDiagnosticReport> $relatedDocuments
     *        Diagnostics of related documents. This information is useful in
     *        programming languages where code in a file A can generate diagnostics in
     *        a file B which A depends on. An example of such a language is C/C++ where
     *        marco definitions in a file a.cpp and result in errors in a header file
     *        b.hpp.
     *        - {@since 3.17.0}
     */
    public function __construct(
        string $resultId,
        public readonly ?array $relatedDocuments = null,
    ) {
        parent::__construct($resultId);
    }
}
