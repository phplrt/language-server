<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

use Phplrt\LanguageServer\Protocol\StaticRegistrationOptions;
use Phplrt\LanguageServer\Protocol\StaticRegistrationOptionsProvider;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptionsProvider;
use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;

/**
 * @since 3.16.0
 */
final class SemanticTokensRegistrationOptions extends SemanticTokensOptions implements
    TextDocumentRegistrationOptions,
    StaticRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;
    use StaticRegistrationOptionsProvider;

    /**
     * @param SemanticTokensLegend $legend The legend used by the server
     * @param bool|object|null $range Server supports providing semantic tokens
     *        for a specific range of a document.
     * @param SemanticTokensOptionsFull|null $full Server supports providing
     *        semantic tokens for a full document.
     *        TODO This field MAY also contain boolean type, but the cuyz/valinor
     *             contains an error due to which a mapping error may occur when
     *             specifying this type.
     * @param list<TextDocumentFilter|NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration.
     *        If set to {@see null} the document selector provided on the client
     *        side will be used.
     * @param ?string $id The id used to register the request. The id can be
     *        used to deregister the request again. See also Registration#id.
     */
    public function __construct(
        SemanticTokensLegend $legend,
        bool|object|null $range = null,
        SemanticTokensOptionsFull|null $full = null,
        array|null $documentSelector = null,
        ?string $id = null,
    ) {
        $this->documentSelector = $documentSelector;
        $this->id = $id;

        parent::__construct($legend, $range, $full);
    }
}
