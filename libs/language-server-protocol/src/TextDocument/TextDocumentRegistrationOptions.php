<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

use Phplrt\LanguageServer\Protocol\Notebook\NotebookCellTextDocumentFilter;

/**
 * @property list<TextDocumentFilter|NotebookCellTextDocumentFilter|string>|null $documentSelector
 */
interface TextDocumentRegistrationOptions
{
}
