<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentFilter;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentRegistrationOptionsProvider;
use Phplrt\LanguageServer\Protocol\Type\CodeActionKind;

/**
 * Registration options for a {@link CodeActionRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class CodeActionRegistrationOptions extends CodeActionOptions implements
    TextDocumentRegistrationOptions
{
    use TextDocumentRegistrationOptionsProvider;

    /**
     * @param ?list<CodeActionKind|string> $codeActionKinds CodeActionKinds
     *        that this server may return.
     *         The list of kinds may be generic, such as `CodeActionKind.Refactor`, or
     *        the server may list out every specific kind they provide.
     * @param ?bool $resolveProvider The server provides support to resolve additional
     *        information for a code action.
     *        - {@since 3.16.0}
     * @param list<TextDocumentFilter|NotebookCellTextDocumentFilter>|null $documentSelector
     *        A document selector to identify the scope of the registration. If set to
     *        null the document selector provided on the client side will be used.
     */
    public function __construct(
        ?array $codeActionKinds = null,
        ?bool $resolveProvider = null,
        array|null $documentSelector = null,
    ) {
        $this->documentSelector = $documentSelector;

        parent::__construct(
            $codeActionKinds,
            $resolveProvider,
        );
    }
}
