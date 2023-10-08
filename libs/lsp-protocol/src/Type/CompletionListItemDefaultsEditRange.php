<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

final class CompletionListItemDefaultsEditRange
{
    public function __construct(
        public readonly Range $insert,
        public readonly Range $replace,
    ) {}
}
