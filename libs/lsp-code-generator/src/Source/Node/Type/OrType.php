<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents an `or` type (e.g. `Location | LocationLink`).
 *
 * @json-schema-ref #/definitions/OrType
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class OrType extends Type
{
    /**
     * @param list<Type> $items
     */
    public function __construct(
        public array $items,
    ) {}

    public static function getKind(): TypeKind
    {
        return TypeKind::OR;
    }
}
