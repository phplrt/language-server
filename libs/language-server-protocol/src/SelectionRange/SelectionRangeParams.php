<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SelectionRange;

use Phplrt\LanguageServer\Protocol\PartialResultParams;
use Phplrt\LanguageServer\Protocol\PartialResultParamsProvider;
use Phplrt\LanguageServer\Protocol\Type\Position;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentIdentifier;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParams;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParamsProvider;

/**
 * A parameter literal used in selection range requests.
 */
final class SelectionRangeParams implements
    WorkDoneProgressParams,
    PartialResultParams
{
    use WorkDoneProgressParamsProvider;
    use PartialResultParamsProvider;

    /**
     * @param TextDocumentIdentifier $textDocument The text document.
     * @param list<Position> $positions The positions inside the text document.
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     *        An optional token that a server can use to report partial results (e.g.
     *        streaming) to the client.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly array $positions,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}
