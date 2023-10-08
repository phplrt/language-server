<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Progress;

final class WorkDoneProgressEnd
{
    public readonly WorkDoneProgressKind $kind;

    /**
     * @param ?string $message Optional, a final message indicating to for
     *        example indicate the outcome of the operation.
     */
    public function __construct(
        public readonly ?string $message = null,
    ) {
        $this->kind = WorkDoneProgressKind::END;
    }
}
