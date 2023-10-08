<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

final class ExecutionSummary
{
    /**
     * @param int<0, 2147483647> $executionOrder A strict monotonically increasing
     *        value indicating the execution order of a cell inside a notebook.
     * @param ?bool $success Whether the execution was successful or not if known by
     *        the client.
     */
    public function __construct(
        public readonly int $executionOrder,
        public readonly ?bool $success = null,
    ) {}
}
