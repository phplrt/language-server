<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\Workspace\WorkspaceEdit;

final class WorkspaceEditChangeAnnotationSupport
{
    /**
     * @param ?bool $groupsOnLabel Whether the client groups edits with equal
     *        labels into tree nodes, for instance all edits labelled with
     *        "Changes in Strings" would be a tree node.
     */
    public function __construct(
        public readonly ?bool $groupsOnLabel = null,
    ) {}
}
