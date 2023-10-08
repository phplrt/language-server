<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Window;

use Phplrt\LanguageServer\Protocol\ClientCapabilities\Window\ShowMessage\ShowMessageActionItem;

/**
 * Show message request client capabilities.
 */
final class ShowMessageRequestClientCapabilities
{
    /**
     * @param ?ShowMessageActionItem $messageActionItem Capabilities specific
     *        to the `MessageActionItem` type.
     */
    public function __construct(
        public readonly ?ShowMessageActionItem $messageActionItem = null,
    ) {}
}
