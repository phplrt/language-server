<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\FoldingRange;

final class ClientCapabilitiesFoldingRange
{
    /**
     * @param ?bool $collapsedText If set, the client signals that it supports
     *        setting collapsedText on folding ranges to display custom labels
     *        instead of the default text.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly ?bool $collapsedText = null,
    ) {}
}
