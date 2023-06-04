<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * A set of predefined code action kinds.
 */
enum CodeActionKind: string implements CodeActionKindInterface
{
    /**
     * Empty kind.
     */
    case EMPTY = '';

    /**
     * Base kind for quickfix actions = 'quickfix'
     */
    case QUICK_FIX = 'quickfix';

    /**
     * Base kind for refactoring actions = 'refactor'
     */
    case REFACTOR = 'refactor';

    /**
     * Base kind for refactoring extraction actions = 'refactor.extract'
     *
     * Example extract actions:
     *
     * - Extract method
     * - Extract function
     * - Extract variable
     * - Extract interface from class
     * - ...
     */
    case REFACTOR_EXTRACT = 'refactor.extract';

    /**
     * Base kind for refactoring inline actions = 'refactor.inline'
     *
     * Example inline actions:
     *
     * - Inline function
     * - Inline variable
     * - Inline caseant
     * - ...
     */
    case REFACTOR_INLINE = 'refactor.inline';

    /**
     * Base kind for refactoring rewrite actions = 'refactor.rewrite'
     *
     * Example rewrite actions:
     *
     * - Convert JavaScript function to class
     * - Add or remove parameter
     * - Encapsulate field
     * - Make method static
     * - Move method to base class
     * - ...
     */
    case REFACTOR_REWRITE = 'refactor.rewrite';

    /**
     * Base kind for source actions: `source`
     *
     * Source code actions apply to the entire file.
     */
    case SOURCE = 'source';

    /**
     * Base kind for an organize imports source action: `source.organizeImports`
     */
    case SOURCE_ORGANIZE_IMPORTS = 'source.organizeImports';

    /**
     * Base kind for auto-fix source actions: `source.fixAll`.
     *
     * Fix all actions automatically fix errors that have a clear fix that do not require user input.
     * They should not suppress errors or perform unsafe fixes such as generating new types or classes.
     *
     * @since 3.15.0
     */
    case SOURCE_FIX_ALL = 'source.fixAll';

    public static function create(string $name): CodeActionKindInterface
    {
        return self::tryFrom($name) ?? new UserCodeActionKind($name);
    }

    public function getActionName(): string
    {
        return $this->value;
    }
}
