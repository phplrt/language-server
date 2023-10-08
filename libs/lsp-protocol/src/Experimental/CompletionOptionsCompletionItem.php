<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class CompletionOptionsCompletionItem
{
    /**
     * @param ?bool $labelDetailsSupport The server has support for completion item
     *        label details (see also `CompletionItemLabelDetails`) when receiving a
     *        completion item in a resolve call.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly ?bool $labelDetailsSupport = null,
    ) {}
}
