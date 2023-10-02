<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Notebook;

/**
 * @since 3.17.0
 */
final class ExecutionSummary
{
    /**
     * @param int<0, max> $executionOrder A strict monotonically increasing
     *        value indicating the execution order of a cell inside a notebook.
     * @param bool|null $success Whether the execution was successful or
     *        not if known by the client.
     */
    public function __construct(
        public readonly int $executionOrder,
        public readonly ?bool $success = null,
    ) {}
}
