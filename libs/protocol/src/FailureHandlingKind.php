<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

enum FailureHandlingKind: string
{
    /**
     * Applying the workspace change is simply aborted if one of the changes
     * provided fails. All operations executed before the failing operation stay
     * executed.
     */
    case ABORT = 'abort';

    /**
     * All operations are executed transactional. That means they either all
     * succeed or no changes at all are applied to the workspace.
     */
    case TRANSACTIONAL = 'transactional';

    /**
     * If the workspace edit contains only textual file changes they are executed
     * transactional. If resource changes (create, rename or delete file) are
     * part of the change the failure handling strategy is abort.
     */
    case UNDO = 'undo';

    /**
     * The client tries to undo the operations already executed. But there is no
     * guarantee that this is succeeding.
     */
    case TEXT_ONLY_TRANSACTIONAL = 'textOnlyTransactional';
}
