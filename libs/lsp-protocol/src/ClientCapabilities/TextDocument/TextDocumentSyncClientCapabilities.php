<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\TextDocument;

final class TextDocumentSyncClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether text document synchronization supports
     *        dynamic registration.
     * @param ?bool $willSave The client supports sending will save notifications.
     * @param ?bool $willSaveWaitUntil The client supports sending a will save request
     *        and waits for a response providing text edits which will be applied to
     *        the document before it is saved.
     * @param ?bool $didSave The client supports did save notifications.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?bool $willSave = null,
        public readonly ?bool $willSaveWaitUntil = null,
        public readonly ?bool $didSave = null,
    ) {}
}
