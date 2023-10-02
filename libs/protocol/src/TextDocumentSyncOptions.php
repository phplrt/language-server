<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

final class TextDocumentSyncOptions
{
    /**
     * @param bool|null $openClose Open and close notifications are sent to the
     *        server. If omitted open close notification should not be sent.
     * @param TextDocumentSyncKind|null $change Change notifications are sent to
     *        the server.
     *        If omitted it defaults to {@see TextDocumentSyncKind::NONE}.
     * @param bool|null $willSave If present will save notifications are sent to
     *        the server.
     *        If omitted the notification should not be sent.
     * @param bool|null $willSaveWaitUntil If present will save wait until
     *        requests are sent to the server.
     *        If omitted the request should not be sent.
     * @param bool|SaveOptions|null $save If present save notifications are sent
     *        to the server.
     *        If omitted the notification should not be sent.
     */
    public function __construct(
        public readonly ?bool $openClose = null,
        public readonly ?TextDocumentSyncKind $change = null,
        public readonly ?bool $willSave = null,
        public readonly ?bool $willSaveWaitUntil = null,
        public readonly bool|SaveOptions|null $save = null,
    ) {}
}
