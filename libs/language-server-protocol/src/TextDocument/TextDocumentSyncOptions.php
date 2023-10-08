<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\TextDocument\SaveOptions;
use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentSyncKind;

final class TextDocumentSyncOptions
{
    /**
     * @param ?bool $openClose Open and close notifications are sent to the server. If
     *        omitted open close notification should not be sent.
     * @param ?TextDocumentSyncKind $change Change notifications are sent to the
     *        server. See TextDocumentSyncKind.None, TextDocumentSyncKind.Full and
     *        TextDocumentSyncKind.Incremental. If omitted it defaults to
     *        TextDocumentSyncKind.None.
     * @param ?bool $willSave If present will save notifications are sent to the
     *        server. If omitted the notification should not be sent.
     * @param ?bool $willSaveWaitUntil If present will save wait until requests are
     *        sent to the server. If omitted the request should not be sent.
     * @param bool|SaveOptions|null $save If present save notifications are sent to the
     *        server. If omitted the notification should not be sent.
     */
    public function __construct(
        public readonly ?bool $openClose = null,
        public readonly ?TextDocumentSyncKind $change = null,
        public readonly ?bool $willSave = null,
        public readonly ?bool $willSaveWaitUntil = null,
        public readonly bool|SaveOptions|null $save = null,
    ) {}
}
