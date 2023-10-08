<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * Describes the currently selected completion item.
 *
 * @since 3.18.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class SelectedCompletionInfo
{
    /**
     * @param Range $range The range that will be replaced if this completion item is
     *        accepted.
     * @param string $text The text the range will be replaced with if this
     *        completion is accepted.
     */
    public function __construct(
        public readonly Range $range,
        public readonly string $text,
    ) {}
}
