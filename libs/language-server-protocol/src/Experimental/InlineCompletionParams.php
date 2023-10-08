<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentPositionParams;
use Phplrt\LanguageServer\Protocol\Type\Position;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentIdentifier;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParams;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParamsProvider;

/**
 * A parameter literal used in inline completion requests.
 *
 * @since 3.18.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class InlineCompletionParams extends TextDocumentPositionParams implements
    WorkDoneProgressParams
{
    use WorkDoneProgressParamsProvider;

    /**
     * @param InlineCompletionContext $context Additional information about the context
     *        in which inline completions were requested.
     * @param TextDocumentIdentifier $textDocument The text document.
     * @param Position $position The position inside the text document.
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     */
    public function __construct(
        public readonly InlineCompletionContext $context,
        TextDocumentIdentifier $textDocument,
        Position $position,
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;

        parent::__construct(
            $textDocument,
            $position,
        );
    }
}
