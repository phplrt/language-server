<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A symbol kind.
 */
enum SymbolKind: int
{
    case KIND_FILE = 1;
    case KIND_MODULE = 2;
    case KIND_NAMESPACE = 3;
    case KIND_PACKAGE = 4;
    case KIND_CLASS = 5;
    case KIND_METHOD = 6;
    case KIND_PROPERTY = 7;
    case KIND_FIELD = 8;
    case KIND_CONSTRUCTOR = 9;
    case KIND_ENUM = 10;
    case KIND_INTERFACE = 11;
    case KIND_FUNCTION = 12;
    case KIND_VARIABLE = 13;
    case KIND_CONSTANT = 14;
    case KIND_STRING = 15;
    case KIND_NUMBER = 16;
    case KIND_BOOLEAN = 17;
    case KIND_ARRAY = 18;
    case KIND_OBJECT = 19;
    case KIND_KEY = 20;
    case KIND_NULL = 21;
    case KIND_ENUM_MEMBER = 22;
    case KIND_STRUCT = 23;
    case KIND_EVENT = 24;
    case KIND_OPERATOR = 25;
    case KIND_TYPE_PARAMETER = 26;
}
