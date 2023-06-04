<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * The diagnostic's severity.
 */
enum DiagnosticSeverity: int
{
    /**
     * Reports an error.
     */
    case ERROR = 1;

    /**
     * Reports a warning.
     */
    case WARNING = 2;

    /**
     * Reports an information.
     */
    case INFORMATION = 3;

    /**
     * Reports a hint.
     */
    case HINT = 4;
}
