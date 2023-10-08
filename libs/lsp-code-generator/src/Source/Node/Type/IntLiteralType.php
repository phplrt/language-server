<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents an integer literal type (e.g. `kind: 1`).
 *
 * @json-schema-ref #/definitions/IntegerLiteralType
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class IntLiteralType extends Type
{
    public function __construct(
        public int $value,
    ) {}

    public static function getKind(): TypeKind
    {
        return TypeKind::INTEGER_LITERAL;
    }
}
