<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

use Phplrt\LanguageServer\Protocol\TextDocument\TextDocumentContentChangeEvent;
use Phplrt\LanguageServer\Protocol\TextDocument\VersionedTextDocumentIdentifier;

final class NotebookDocumentChangeEventCellsTextContent
{
    /**
     * @param VersionedTextDocumentIdentifier $document
     * @param list<TextDocumentContentChangeEvent> $changes
     */
    public function __construct(
        public readonly VersionedTextDocumentIdentifier $document,
        public readonly array $changes,
    ) {}
}
