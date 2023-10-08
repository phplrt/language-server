<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\Type\CodeActionKind;
use Phplrt\LanguageServer\Protocol\Type\Command;
use Phplrt\LanguageServer\Protocol\Type\Diagnostic;
use Phplrt\LanguageServer\Protocol\Type\WorkspaceEdit;

/**
 * A code action represents a change that can be performed in code, e.g. to fix a
 * problem or to refactor code.
 * A CodeAction must set either {@see $edit} and/or a {@see $command}. If both are supplied,
 * the {@see $edit} is applied first, then the {@see $command} is executed.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class CodeAction
{
    /**
     * @param string $title A short, human-readable, title for this code
     *        action.
     * @param CodeActionKind|string|null $kind The kind of the code action.
     *         Used to filter code actions.
     * @param ?list<Diagnostic> $diagnostics The diagnostics that this code action
     *        resolves.
     * @param ?bool $isPreferred Marks this as a preferred action. Preferred actions
     *        are used by the `auto fix` command and can be targeted by keybindings.
     *         A quick fix should be marked preferred if it properly addresses the
     *        underlying error. A refactoring should be marked preferred if it is the
     *        most reasonable choice of actions to take.
     *        - {@since 3.15.0}
     * @param ?CodeActionDisabled $disabled Marks that the code action cannot currently
     *        be applied.
     *         Clients should follow the following guidelines regarding disabled code
     *        actions:
     *
     *          - Disabled code actions are not shown in automatic
     *        [lightbulbs](https://code.visualstudio.com/docs/editor/editingevolved#_code-action)
     *        code action menus.
     *
     *          - Disabled actions are shown as faded out in the code action menu when
     *        the user requests a more specific type of code action, such as
     *        refactorings.
     *
     *          - If the user has a
     *        [keybinding](https://code.visualstudio.com/docs/editor/refactoring#_keybindings-for-code-actions)
     *        that auto applies a code action and only disabled code actions are
     *        returned, the client should show the user an error message with {@see $reason}
     *        in the editor.
     *        - {@since 3.16.0}
     * @param ?WorkspaceEdit $edit The workspace edit this code action performs.
     * @param ?Command $command A command this code action executes. If a code action
     *        provides an edit and a command, first the edit is executed and then the
     *        command.
     * @param mixed $data A data entry field that is preserved on a code action between
     *        a `textDocument/codeAction` and a `codeAction/resolve` request.
     *        - {@since 3.16.0}
     */
    public function __construct(
        public readonly string $title,
        public readonly CodeActionKind|string|null $kind = null,
        public readonly ?array $diagnostics = null,
        public readonly ?bool $isPreferred = null,
        public readonly ?CodeActionDisabled $disabled = null,
        public readonly ?WorkspaceEdit $edit = null,
        public readonly ?Command $command = null,
        public readonly mixed $data = null,
    ) {}
}
