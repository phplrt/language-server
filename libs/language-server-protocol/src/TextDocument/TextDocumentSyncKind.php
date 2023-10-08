<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

/**
 * Defines how the host (editor) should sync document changes to the language
 * server.
 */
enum TextDocumentSyncKind: int
{
    /**
     * Documents should not be synced at all.
     */
    case NONE = 0;

    /**
     * Documents are synced by always sending the full content of the document.
     */
    case FULL = 1;

    /**
     * Documents are synced by sending the full content on open. After that only
     * incremental updates to the document are send.
     */
    case INCREMENTAL = 2;
}
