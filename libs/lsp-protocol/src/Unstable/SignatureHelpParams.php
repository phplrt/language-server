<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentPositionParams;
use Phplrt\LanguageServer\Protocol\Type\Position;
use Phplrt\LanguageServer\Protocol\Type\TextDocumentIdentifier;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParams;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressParamsProvider;

/**
 * Parameters for a {@link SignatureHelpRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class SignatureHelpParams extends TextDocumentPositionParams implements
    WorkDoneProgressParams
{
    use WorkDoneProgressParamsProvider;

    /**
     * @param ?SignatureHelpContext $context The signature help context. This is only
     *        available if the client specifies to send this using the client
     *        capability `textDocument.signatureHelp.contextSupport === true`
     *        - {@since 3.15.0}
     * @param TextDocumentIdentifier $textDocument The text document.
     * @param Position $position The position inside the text document.
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     *        An optional token that a server can use to report work done progress.
     */
    public function __construct(
        public readonly ?SignatureHelpContext $context = null,
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
