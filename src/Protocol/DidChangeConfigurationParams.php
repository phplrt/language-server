<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The parameters of a change configuration notification.
 */
final class DidChangeConfigurationParams
{
    /**
     * @param mixed $settings The actual changed settings
     */
    public function __construct(
        public readonly mixed $settings = null,
    ) {}
}
