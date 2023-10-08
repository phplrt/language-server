<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Represents a related message and source code location for a diagnostic. This
 * should be used to point to code locations that cause or related to a
 * diagnostics, e.g when duplicating a symbol in a scope.
 */
final class DiagnosticRelatedInformation
{
    /**
     * @param Location $location The location of this related diagnostic
     *        information.
     * @param string $message The message of this related diagnostic
     *        information.
     */
    public function __construct(
        public readonly Location $location,
        public readonly string $message,
    ) {}
}
