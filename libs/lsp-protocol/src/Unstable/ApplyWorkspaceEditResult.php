<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

/**
 * The result returned from the apply workspace edit request.
 *
 * @since 3.17 renamed from ApplyWorkspaceEditResponse
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class ApplyWorkspaceEditResult
{
    /**
     * @param bool $applied Indicates whether the edit was applied or not.
     * @param ?string $failureReason An optional textual description for why
     *        the edit was not applied. This may be used by the server for diagnostic
     *        logging or to provide a suitable error for a request that triggered the
     *        edit.
     * @param ?int<0, 2147483647> $failedChange Depending on the client's failure
     *        handling strategy {@see $failedChange} might contain the index of the change
     *        that failed. This property is only available if the client signals a
     *        {@see $failureHandlingStrategy} in its client capabilities.
     */
    public function __construct(
        public readonly bool $applied,
        public readonly ?string $failureReason = null,
        public readonly ?int $failedChange = null,
    ) {}
}
