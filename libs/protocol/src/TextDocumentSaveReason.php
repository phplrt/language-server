<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Represents reasons why a text document is saved.
 */
enum TextDocumentSaveReason: int
{
    /**
     * Manually triggered, e.g. by the user pressing save, by starting
     * debugging, or by an API call.
     */
    case MANUAL = 1;

    /**
     * Automatic after a delay.
     */
    case AFTER_DELAY = 2;

    /**
     * When the editor lost focus.
     */
    case FOCUS_OUT = 3;
}
