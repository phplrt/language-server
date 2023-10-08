<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Implementation;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;
use Phplrt\LanguageServer\Protocol\StaticRegistrationOptions;
use Phplrt\LanguageServer\Protocol\StaticRegistrationOptionsProvider;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptionsProvider;

final class ImplementationRegistrationOptions extends ImplementationOptions implements
    TextDocumentRegistrationOptions,
    StaticRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;
    use StaticRegistrationOptionsProvider;

    /**
     * @param list<TextDocumentFilter|NotebookCellTextDocumentFilter|string>|null $documentSelector
     *        A document selector to identify the scope of the registration.
     *        If set to {@see null} the document selector provided on the client
     *        side will be used.
     * @param ?string $id The id used to register the request. The id can be
     *        used to deregister the request again. See also Registration#id.
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        array|null $documentSelector,
        ?string $id = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->documentSelector = $documentSelector;
        $this->id = $id;

        parent::__construct($workDoneProgress);
    }
}
