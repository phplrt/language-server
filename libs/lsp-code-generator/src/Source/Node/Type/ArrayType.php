<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents an array type (e.g. `TextDocument[]`).
 *
 * @json-schema-ref #/definitions/ArrayType
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class ArrayType extends Type
{
    public function __construct(
        public Type $element,
    ) {}

    public static function getKind(): TypeKind
    {
        return TypeKind::ARRAY;
    }
}
