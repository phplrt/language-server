<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A set of predefined token modifiers. This set is not fixed an clients can
 * specify additional token types via the corresponding client capabilities.
 *
 * @since 3.16.0
 */
enum SemanticTokenModifiers: string
{
    case MODIFIER_DECLARATION = 'declaration';
    case MODIFIER_DEFINITION = 'definition';
    case MODIFIER_READONLY = 'readonly';
    case MODIFIER_STATIC = 'static';
    case MODIFIER_DEPRECATED = 'deprecated';
    case MODIFIER_ABSTRACT = 'abstract';
    case MODIFIER_ASYNC = 'async';
    case MODIFIER_MODIFICATION = 'modification';
    case MODIFIER_DOCUMENTATION = 'documentation';
    case MODIFIER_DEFAULT_LIBRARY = 'defaultLibrary';
}
