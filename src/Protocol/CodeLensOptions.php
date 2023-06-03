<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * Code Lens provider options of a 'textDocument/codeLens' RPC request.
 */
final class CodeLensOptions extends WorkDoneProgressOptions
{
    /**
     * @param bool|null $resolveProvider Code lens has a resolve provider as
     *        well.
     * @param bool|null $workDoneProgress
     */
    public function __construct(
        public readonly ?bool $resolveProvider = null,
        ?bool $workDoneProgress = null,
    ) {
        parent::__construct($workDoneProgress);
    }
}
