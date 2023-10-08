<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\TextDocument;

/**
 * Save options.
 */
class SaveOptions
{
    /**
     * @param ?bool $includeText The client is supposed to include the content on save.
     */
    public function __construct(
        public readonly ?bool $includeText = null,
    ) {}
}
