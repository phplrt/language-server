<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\WorkspaceEdit;

/**
 * The parameters passed via an apply workspace edit request.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class ApplyWorkspaceEditParams
{
    /**
     * @param ?string $label An optional label of the workspace edit. This
     *        label is presented in the user interface for example on an undo stack to
     *        undo the workspace edit.
     * @param WorkspaceEdit $edit The edits to apply.
     */
    public function __construct(
        public readonly ?string $label = null,
        public readonly WorkspaceEdit $edit,
    ) {}
}
