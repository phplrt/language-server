<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Inlay hint options used during static registration.
 *
 * @since 3.17.0
 */
final class InlayHintOptions extends WorkDoneProgressOptions
{
    /**
     * @param bool|null $resolveProvider The server provides support to resolve
     *        additional information for an inlay hint item.
     * @param bool|null $workDoneProgress
     */
    public function __construct(
        public readonly ?bool $resolveProvider = null,
        ?bool $workDoneProgress = null
    ) {
        parent::__construct($workDoneProgress);
    }
}
