<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * A set of predefined token types. This set is not fixed
 * an clients can specify additional token types via the
 * corresponding client capabilities.
 *
 * @since 3.16.0
 */
enum SemanticTokenTypes: string
{
    case TYPE_NAMESPACE = 'namespace';

    /**
     * Represents a generic type. Acts as a fallback for types which can't be
     * mapped to a specific type like class or enum.
     */
    case TYPE_TYPE = 'type';
    case TYPE_CLASS = 'class';
    case TYPE_ENUM = 'enum';
    case TYPE_INTERFACE = 'interface';
    case TYPE_STRUCT = 'struct';
    case TYPE_TYPE_PARAMETER = 'typeParameter';
    case TYPE_PARAMETER = 'parameter';
    case TYPE_VARIABLE = 'variable';
    case TYPE_PROPERTY = 'property';
    case TYPE_ENUM_MEMBER = 'enumMember';
    case TYPE_EVENT = 'event';
    case TYPE_FUNCTION = 'function';
    case TYPE_METHOD = 'method';
    case TYPE_MACRO = 'macro';
    case TYPE_KEYWORD = 'keyword';
    case TYPE_MODIFIER = 'modifier';
    case TYPE_COMMENT = 'comment';
    case TYPE_STRING = 'string';
    case TYPE_NUMBER = 'number';
    case TYPE_REGEXP = 'regexp';
    case TYPE_OPERATOR = 'operator';

    /**
     * @since 3.17.0
     */
    case TYPE_DECORATOR = 'decorator';
}
