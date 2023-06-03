<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Save options.
 */
final class SaveOptions
{
    /**
     * @param bool|null $includeText The client is supposed to include the
     *        content on save.
     */
    public function __construct(
        public readonly ?bool $includeText = null,
    ) {
    }
}
