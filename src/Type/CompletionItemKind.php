<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * The kind of a completion entry.
 */
enum CompletionItemKind: int
{
    case KIND_TEXT = 1;
    case KIND_METHOD = 2;
    case KIND_FUNCTION = 3;
    case KIND_CONSTRUCTOR = 4;
    case KIND_FIELD = 5;
    case KIND_VARIABLE = 6;
    case KIND_CLASS = 7;
    case KIND_INTERFACE = 8;
    case KIND_MODULE = 9;
    case KIND_PROPERTY = 10;
    case KIND_UNIT = 11;
    case KIND_VALUE = 12;
    case KIND_ENUM = 13;
    case KIND_KEYWORD = 14;
    case KIND_SNIPPET = 15;
    case KIND_COLOR = 16;
    case KIND_FILE = 17;
    case KIND_REFERENCE = 18;
    case KIND_FOLDER = 19;
    case KIND_ENUM_MEMBER = 20;
    case KIND_CONSTANT = 21;
    case KIND_STRUCT = 22;
    case KIND_EVENT = 23;
    case KIND_OPERATOR = 24;
    case KIND_TYPE_PARAMETER = 25;
}
