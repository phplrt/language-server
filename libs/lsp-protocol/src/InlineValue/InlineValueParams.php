<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlineValue;

use Phplrt\LanguageServer\Protocol\Type\Range;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentIdentifier;
use Phplrt\LanguageServer\Protocol\Type\InlineValueContext;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParams;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParamsProvider;

/**
 * A parameter literal used in inline value requests.
 *
 * @since 3.17.0
 */
final class InlineValueParams implements WorkDoneProgressParams
{
    use WorkDoneProgressParamsProvider;

    /**
     * @param TextDocumentIdentifier $textDocument The text document.
     * @param Range $range The document range for which inline values should be
     *        computed.
     * @param InlineValueContext $context Additional information about the
     *        context in which inline values were requested.
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Range $range,
        public readonly InlineValueContext $context,
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
