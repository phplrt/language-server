<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Progress;

final class WorkDoneProgressBegin
{
    public readonly WorkDoneProgressKind $kind;

    /**
     * @param string $title Mandatory title of the progress operation. Used
     *        to briefly inform about the kind of operation being performed.
     *         Examples: "Indexing" or "Linking dependencies".
     * @param ?bool $cancellable Controls if a cancel button should show to allow the
     *        user to cancel the long running operation. Clients that don't support
     *        cancellation are allowed to ignore the setting.
     * @param ?string $message Optional, more detailed associated progress
     *        message. Contains complementary information to the {@see $title}.
     *         Examples: "3/25 files", "project/src/module2", "node_modules/some_dep".
     *        If unset, the previous progress message (if any) is still valid.
     * @param ?int<0, 2147483647> $percentage Optional progress percentage to display
     *        (value 100 is considered 100%). If not provided infinite progress is
     *        assumed and clients are allowed to ignore the {@see $percentage} value in
     *        subsequent in report notifications.
     *         The value should be steadily rising. Clients are free to ignore values
     *        that are not following this rule. The value range is [0, 100].
     */
    public function __construct(
        public readonly string $title,
        public readonly ?bool $cancellable = null,
        public readonly ?string $message = null,
        public readonly ?int $percentage = null,
    ) {
        $this->kind = WorkDoneProgressKind::BEGIN;
    }
}
