<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\StructureLiteralStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents a literal structure
 * (e.g. `property: { start: uinteger; end: uinteger; }`).
 *
 * @json-schema-ref #/definitions/StructureLiteralType
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class StructureLiteralType extends Type
{
    public function __construct(
        public StructureLiteralStatement $value,
    ) {
    }

    public static function getKind(): TypeKind
    {
        return TypeKind::LITERAL;
    }
}
