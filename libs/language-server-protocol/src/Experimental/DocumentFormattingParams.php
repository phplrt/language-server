<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentIdentifier;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParams;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParamsProvider;

/**
 * The parameters of a {@link DocumentFormattingRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class DocumentFormattingParams implements
    WorkDoneProgressParams
{
    use WorkDoneProgressParamsProvider;

    /**
     * @param TextDocumentIdentifier $textDocument The document to format.
     * @param FormattingOptions $options The format options.
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly FormattingOptions $options,
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
