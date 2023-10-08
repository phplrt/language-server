<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents a reference to another type (e.g. `TextDocument`).
 * This is either a `Structure`, a `Enumeration` or a `TypeAlias`
 * in the same meta model.
 *
 * @json-schema-ref #/definitions/ReferenceType
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class ReferenceType extends Type
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        public string $name,
    ) {}

    public static function getKind(): TypeKind
    {
        return TypeKind::REFERENCE;
    }
}
