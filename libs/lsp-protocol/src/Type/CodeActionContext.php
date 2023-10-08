<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Contains additional diagnostic information about the context in which a
 * {@see CodeActionProvider::$provideCodeActions} code action is run.
 */
final class CodeActionContext
{
    /**
     * @param list<CodeActionKind> $diagnostics An array of diagnostics known on
     *        the client side overlapping the range provided to the
     *        `textDocument/codeAction` request. They are provided so that the server
     *        knows which errors are currently presented to the user for the given
     *        range. There is no guarantee that these accurately reflect the error
     *        state of the resource. The primary parameter to compute code actions is
     *        the provided range.
     * @param ?list<CodeActionKind> $only Requested kind of actions to return.
     *        Actions not of this kind are filtered out by the client before
     *        being shown. So servers can omit computing them.
     * @param ?CodeActionTriggerKind $triggerKind The reason why code actions
     *        were requested.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly array $diagnostics,
        public readonly ?array $only = null,
        public readonly ?CodeActionTriggerKind $triggerKind = null,
    ) {}
}
