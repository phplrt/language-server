<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\SemanticTokens;

/**
 * A set of predefined token modifiers. This set is not fixed an clients can
 * specify additional token types via the corresponding client capabilities.
 *
 * @since 3.16.0
 */
enum SemanticTokenModifiers: string
{
    case DECLARATION = "declaration";
    case DEFINITION = "definition";
    case READONLY = "readonly";
    case STATIC = "static";
    case DEPRECATED = "deprecated";
    case ABSTRACT = "abstract";
    case ASYNC = "async";
    case MODIFICATION = "modification";
    case DOCUMENTATION = "documentation";
    case DEFAULT_LIBRARY = "defaultLibrary";
}
