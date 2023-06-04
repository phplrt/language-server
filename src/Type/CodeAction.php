<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * A code action represents a change that can be performed in code, e.g. to fix
 * a problem or to refactor code.
 *
 * A CodeAction must set either `edit` and/or a `command`. If both are supplied,
 * the `edit` is applied first, then the `command` is executed.
 *
 * @deprecated NOT IMPLEMENTED YET
 */
final class CodeAction
{
}
