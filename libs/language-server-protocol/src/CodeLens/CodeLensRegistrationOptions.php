<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\CodeLens;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptionsProvider;

/**
 * Registration options for a {@link CodeLensRequest}.
 */
final class CodeLensRegistrationOptions extends CodeLensOptions implements
    TextDocumentRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;

    /**
     * @param list<TextDocumentFilter|NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param ?bool $resolveProvider Code lens has a resolve provider as well.
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        array|null $documentSelector,
        ?bool $resolveProvider = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->documentSelector = $documentSelector;

        parent::__construct($resolveProvider, $workDoneProgress);
    }
}
