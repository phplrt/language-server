<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * The diagnostic tags.
 *
 * @since 3.15.0
 */
enum DiagnosticTag: int
{
    /**
     * Unused or unnecessary code.
     *
     * Clients are allowed to render diagnostics with this tag faded out instead
     * of having an error squiggle.
     */
    case UNNECESSARY = 1;

    /**
     * Deprecated or obsolete code.
     *
     * Clients are allowed to rendered diagnostics with this tag strike through.
     */
    case DEPRECATED = 2;
}
