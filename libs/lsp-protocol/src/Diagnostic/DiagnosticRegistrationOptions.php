<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;
use Phplrt\LanguageServer\Protocol\StaticRegistrationOptions;
use Phplrt\LanguageServer\Protocol\StaticRegistrationOptionsProvider;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptionsProvider;

/**
 * Diagnostic registration options.
 *
 * @since 3.17.0
 */
final class DiagnosticRegistrationOptions extends DiagnosticOptions implements
    TextDocumentRegistrationOptions,
    StaticRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;
    use StaticRegistrationOptionsProvider;

    /**
     * @param ?string $identifier An optional identifier under which the
     *        diagnostics are managed by the client.
     * @param bool $interFileDependencies Whether the language has inter file
     *        dependencies meaning that editing code in one file can result in a
     *        different diagnostic set in another file. Inter file dependencies are
     *        common for most programming languages and typically uncommon for linters.
     * @param bool $workspaceDiagnostics The server provides support for workspace
     *        diagnostics as well.
     * @param list<NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param ?string $id The id used to register the request. The id can be
     *        used to deregister the request again. See also Registration#id.
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        ?string $identifier = null,
        bool $interFileDependencies = false,
        bool $workspaceDiagnostics = false,
        array|null $documentSelector = null,
        ?string $id = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->documentSelector = $documentSelector;
        $this->id = $id;

        parent::__construct(
            $identifier,
            $interFileDependencies,
            $workspaceDiagnostics,
            $workDoneProgress,
        );
    }
}
