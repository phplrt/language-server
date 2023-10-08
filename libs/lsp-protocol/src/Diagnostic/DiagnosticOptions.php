<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * Diagnostic options.
 *
 * @since 3.17.0
 */
class DiagnosticOptions implements WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsProvider;

    /**
     * @param ?string $identifier An optional identifier under which the
     *        diagnostics are managed by the client.
     * @param bool $interFileDependencies Whether the language has inter file
     *        dependencies meaning that editing code in one file can result in a
     *        different diagnostic set in another file. Inter file dependencies
     *        are common for most programming languages and typically uncommon
     *        for linters.
     * @param bool $workspaceDiagnostics The server provides support for workspace
     *        diagnostics as well.
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        public readonly ?string $identifier = null,
        public readonly bool $interFileDependencies = false,
        public readonly bool $workspaceDiagnostics = false,
        ?bool $workDoneProgress = null,
    ) {
        $this->workDoneProgress = $workDoneProgress;
    }
}
