<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * How a signature help was triggered.
 *
 * @since 3.15.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
enum SignatureHelpTriggerKind: int
{
    /**
     * Signature help was invoked manually by the user or by a command.
     */
    case INVOKED = 1;

    /**
     * Signature help was triggered by a trigger character.
     */
    case TRIGGER_CHARACTER = 2;

    /**
     * Signature help was triggered by the cursor moving or by the document
     * content changing.
     */
    case CONTENT_CHANGE = 3;
}
