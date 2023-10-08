<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\Position;
use Phplrt\LanguageServer\Protocol\Type\TextDocumentIdentifier;

/**
 * The parameters of a {@link DocumentOnTypeFormattingRequest}.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class DocumentOnTypeFormattingParams
{
    /**
     * @param TextDocumentIdentifier $textDocument The document to format.
     * @param Position $position The position around which the on type formatting
     *        should happen. This is not necessarily the exact position where the
     *        character denoted by the property {@see $ch} got typed.
     * @param string $ch The character that has been typed that triggered the
     *        formatting on type request. That is not necessarily the last character
     *        that got inserted into the document since the client could auto insert
     *        characters as well (e.g. like automatic brace completion).
     * @param FormattingOptions $options The formatting options.
     */
    public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Position $position,
        public readonly string $ch,
        public readonly FormattingOptions $options,
    ) {}
}
