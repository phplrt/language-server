<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptions;
use Phplrt\LanguageServer\Protocol\WorkDoneProgressOptionsProvider;

/**
 * @since 3.16.0
 */
class SemanticTokensOptions implements WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsProvider;

    /**
     * @param SemanticTokensLegend $legend The legend used by the server
     * @param bool|object|null $range Server supports providing semantic tokens for a
     *        specific range of a document.
     * @param SemanticTokensOptionsFull|null $full Server supports providing
     *        semantic tokens for a full document.
     *        TODO This field MAY also contain boolean type, but the cuyz/valinor
     *             contains an error due to which a mapping error may occur when
     *             specifying this type.
     * @param ?bool $workDoneProgress
     */
    public function __construct(
        public readonly SemanticTokensLegend $legend,
        public readonly bool|object|null $range = null,
        public readonly SemanticTokensOptionsFull|null $full = null,
        ?bool $workDoneProgress = null,
    ) {
        $this->workDoneProgress = $workDoneProgress;
    }
}
