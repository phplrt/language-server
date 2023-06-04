<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * A workspace edit represents changes to many resources managed in the
 * workspace. The edit should either provide `changes` or `documentChanges`. If
 * documentChanges are present they are preferred over `changes` if the client
 * can handle versioned document edits.
 *
 * Since version 3.13.0 a workspace edit can contain resource operations as
 * well. If resource operations are present clients need to execute the
 * operations in the order in which they are provided. So a workspace edit for
 * example can consist of the following two changes:
 * (1) a create file a.txt and (2) a text document edit which insert text into
 * file a.txt.
 *
 * An invalid sequence (e.g. (1) delete file a.txt and (2) insert text into
 * file a.txt) will cause failure of the operation. How the client recovers
 * from the failure is described by the client capability:
 * `workspace.workspaceEdit.failureHandling`
 *
 * @deprecated NOT IMPLEMENTED YET
 */
final class WorkspaceEdit
{
}
