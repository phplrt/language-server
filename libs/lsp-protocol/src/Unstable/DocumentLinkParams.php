<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\PartialResultParams;
use Phplrt\LanguageServer\Protocol\PartialResultParamsProvider;
use Phplrt\LanguageServer\Protocol\Type\TextDocumentIdentifier;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParams;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParamsProvider;

/**
 * The parameters of a {@link DocumentLinkRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class DocumentLinkParams implements
    WorkDoneProgressParams,
    PartialResultParams
{
    use WorkDoneProgressParamsProvider;
    use PartialResultParamsProvider;

    /**
     * @param TextDocumentIdentifier $textDocument The document to provide document
     *        links for.
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     *        An optional token that a server can use to report partial results (e.g.
     *        streaming) to the client.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}