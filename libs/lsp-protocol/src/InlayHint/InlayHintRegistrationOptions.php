<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlayHint;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;
use Phplrt\LanguageServer\Protocol\StaticRegistrationOptions;
use Phplrt\LanguageServer\Protocol\StaticRegistrationOptionsProvider;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptionsProvider;

/**
 * Inlay hint options used during static or dynamic registration.
 *
 * @since 3.17.0
 */
final class InlayHintRegistrationOptions extends InlayHintOptions implements
    TextDocumentRegistrationOptions,
    StaticRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;
    use StaticRegistrationOptionsProvider;

    /**
     * @param ?bool $resolveProvider The server provides support to resolve
     *        additional information for an inlay hint item.
     * @param list<NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     * @param ?string $id The id used to register the request. The id can be
     *        used to deregister the request again. See also Registration#id.
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        ?bool $resolveProvider = null,
        array|null $documentSelector = null,
        ?string $id = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->documentSelector = $documentSelector;
        $this->id = $id;

        parent::__construct($resolveProvider, $workDoneProgress);
    }
}
