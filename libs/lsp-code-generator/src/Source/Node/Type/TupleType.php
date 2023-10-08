<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents a `tuple` type (e.g. `[integer, integer]`).
 *
 * @json-schema-ref #/definitions/TupleType
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class TupleType extends Type
{
    /**
     * @param list<Type> $items
     */
    public function __construct(
        public array $items,
    ) {}

    public static function getKind(): TypeKind
    {
        return TypeKind::TUPLE;
    }
}
