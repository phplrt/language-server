<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents a base type like `string` or `DocumentUri`.
 *
 * @json-schema-ref #/definitions/BaseType
 *
 * @template TName of 'URI'|'DocumentUri'|'integer'|'uinteger'|'decimal'|'RegExp'|'string'|'boolean'|'null'
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class BaseType extends Type
{
    /**
     * @param TName $name
     */
    public function __construct(
        public string $name,
    ) {}

    public static function getKind(): TypeKind
    {
        return TypeKind::BASE;
    }
}
