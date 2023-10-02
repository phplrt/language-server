<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A default edit range.
 *
 * @since 3.17.0
 */
final class EditRange
{
    public function __construct(
        public readonly Range $insert,
        public readonly Range $replace,
    ) {}
}
