<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * Inlay hint kinds.
 *
 * @since 3.17.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
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
