<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\InlayHint;

/**
 * Inlay hint kinds.
 *
 * @since 3.17.0
 */
enum InlayHintKind: int
{
    /**
     * An inlay hint that for a type annotation.
     */
    case TYPE = 1;

    /**
     * An inlay hint that is for a parameter.
     */
    case PARAMETER = 2;
}
