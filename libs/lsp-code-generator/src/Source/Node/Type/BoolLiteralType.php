<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents a boolean literal type (e.g. `kind: true`).
 *
 * @json-schema-ref #/definitions/BooleanLiteralType
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class BoolLiteralType extends Type
{
    public function __construct(
        public bool $value,
    ) {}

    public static function getKind(): TypeKind
    {
        return TypeKind::BOOLEAN_LITERAL;
    }
}
