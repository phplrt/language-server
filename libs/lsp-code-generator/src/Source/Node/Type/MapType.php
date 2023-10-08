<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents a JSON object map
 * (e.g. `interface Map<K extends string | integer, V> { [key: K] => V; }`).
 *
 * @json-schema-ref #/definitions/MapType
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class MapType extends Type
{
    /**
     * @param BaseType|ReferenceType $key Represents a type that can be used as
     *        a key in a map type. If a reference type is used then the type
     *        must either resolve to a `string` or `integer` type.
     *        (e.g. `type ChangeAnnotationIdentifier === string`).
     * @param Type $value
     */
    public function __construct(
        public BaseType|ReferenceType $key,
        public Type $value,
    ) {}

    public static function getKind(): TypeKind
    {
        return TypeKind::MAP;
    }
}
