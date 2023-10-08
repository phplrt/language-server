<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node;

/**
 * Represents a `tuple` type (e.g. `[integer, integer]`).
 *
 * @json-schema-ref #/definitions/TypeKind
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
enum TypeKind: string
{
    case BASE = 'base';
    case REFERENCE = 'reference';
    case ARRAY = 'array';
    case MAP = 'map';
    case AND = 'and';
    case OR = 'or';
    case TUPLE = 'tuple';
    case LITERAL = 'literal';
    case STRING_LITERAL = 'stringLiteral';
    case INTEGER_LITERAL = 'integerLiteral';
    case BOOLEAN_LITERAL = 'booleanLiteral';
}
