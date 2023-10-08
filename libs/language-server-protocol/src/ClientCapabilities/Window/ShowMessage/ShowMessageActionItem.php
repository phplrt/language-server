<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Window\ShowMessage;

final class ShowMessageActionItem
{
    /**
     * @param ?bool $additionalPropertiesSupport Whether the client supports additional
     *        attributes which are preserved and send back to the server in the
     *        request's response.
     */
    public function __construct(
        public readonly ?bool $additionalPropertiesSupport = null,
    ) {}
}
