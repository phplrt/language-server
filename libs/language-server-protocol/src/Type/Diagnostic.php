<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Represents a diagnostic, such as a compiler error or warning. Diagnostic objects
 * are only valid in the scope of a resource.
 */
final class Diagnostic
{
    /**
     * @param Range $range The range at which the message applies.
     * @param ?DiagnosticSeverity $severity The diagnostic's severity. Can be omitted.
     *        If omitted it is up to the client to interpret diagnostics as error,
     *        warning, info or hint.
     * @param int<-2147483648, 2147483647>|string|null $code The diagnostic's
     *        code, which usually appear in the user interface.
     * @param ?CodeDescription $codeDescription An optional property to describe the
     *        error code. Requires the code field (above) to be present/not null.
     *        - {@since 3.16.0}
     * @param ?string $source A human-readable string describing the source
     *        of this diagnostic, e.g. 'typescript' or 'super lint'. It usually appears
     *        in the user interface.
     * @param string $message The diagnostic's message. It usually appears in
     *        the user interface
     * @param ?list<DiagnosticRelatedInformation> $tags Additional metadata
     *        about the diagnostic.
     *        - {@since 3.15.0}
     * @param ?list<DiagnosticRelatedInformation> $relatedInformation An array of
     *        related diagnostic information, e.g. when symbol-names within a scope
     *        collide all definitions can be marked via this property.
     * @param mixed $data A data entry field that is preserved between a
     *        `textDocument/publishDiagnostics` notification and
     *        `textDocument/codeAction` request.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly Range $range,
        public readonly string $message,
        public readonly ?DiagnosticSeverity $severity = null,
        public readonly int|string|null $code = null,
        public readonly ?CodeDescription $codeDescription = null,
        public readonly ?string $source = null,
        public readonly ?array $tags = null,
        public readonly ?array $relatedInformation = null,
        public readonly mixed $data = null,
    ) {}
}
