<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlayHint;

use Phplrt\LanguageServer\Protocol\Type\Range;
use Phplrt\LanguageServer\Protocol\Type\TextDocumentIdentifier;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParams;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParamsProvider;

/**
 * A parameter literal used in inlay hint requests.
 *
 * @since 3.17.0
 */
final class InlayHintParams implements WorkDoneProgressParams
{
    use WorkDoneProgressParamsProvider;

    /**
     * @param TextDocumentIdentifier $textDocument The text document.
     * @param Range $range The document range for which inlay hints should be computed.
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Range $range,
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
