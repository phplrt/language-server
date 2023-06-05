<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

/**
 * Cancellation data returned from a diagnostic request.
 *
 * @since 3.17.0
 */
final class DiagnosticServerCancellationData
{
    /**
     * @param bool $retriggerRequest
     */
    public function __construct(
        public readonly bool $retriggerRequest,
    ) {}
}
