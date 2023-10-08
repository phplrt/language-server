<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

use Phplrt\LanguageServer\Protocol\PartialResultParams;
use Phplrt\LanguageServer\Protocol\PartialResultParamsProvider;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentIdentifier;
use Phplrt\LanguageServer\Protocol\Type\Range;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParams;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParamsProvider;

/**
 * @since 3.16.0
 */
final class SemanticTokensRangeParams implements
    WorkDoneProgressParams,
    PartialResultParams
{
    use WorkDoneProgressParamsProvider;
    use PartialResultParamsProvider;

    /**
     * @param TextDocumentIdentifier $textDocument The text document.
     * @param Range $range The range the semantic tokens are requested for.
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     *        An optional token that a server can use to report partial results (e.g.
     *        streaming) to the client.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Range $range,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}
