<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents a string literal type (e.g. `kind: 'rename'`).
 *
 * @json-schema-ref #/definitions/StringLiteralType
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class StringLiteralType extends Type
{
    public function __construct(
        public string $value,
    ) {}

    public static function getKind(): TypeKind
    {
        return TypeKind::STRING_LITERAL;
    }
}
