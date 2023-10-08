<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Progress;

final class WorkDoneProgressReport
{
    public readonly WorkDoneProgressKind $kind;

    /**
     * @param ?bool $cancellable Controls enablement state of a cancel button.
     *        Clients that don't support cancellation or don't support
     *        controlling the button's enablement state are allowed to ignore
     *        the property.
     * @param ?string $message Optional, more detailed associated progress
     *        message. Contains complementary information to the `title`.
     *        Examples: "3/25 files", "project/src/module2", "node_modules/some_dep".
     *        If unset, the previous progress message (if any) is still valid.
     * @param ?int<0, 100> $percentage Optional progress percentage to
     *        display (value 100 is considered 100%). If not provided infinite
     *        progress is assumed and clients are allowed to ignore
     *        the {@see $percentage} value in subsequent in report notifications.
     *        The value should be steadily rising. Clients are free to ignore
     *        values that are not following this rule.
     *
     *        The value range is [0, 100].
     */
    public function __construct(
        public readonly ?bool $cancellable = null,
        public readonly ?string $message = null,
        public readonly ?int $percentage = null,
    ) {
        $this->kind = WorkDoneProgressKind::REPORT;
    }
}
