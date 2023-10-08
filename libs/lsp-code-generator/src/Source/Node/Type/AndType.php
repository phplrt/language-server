<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * Represents an `and`type (e.g. TextDocumentParams & WorkDoneProgressParams`).
 *
 * @json-schema-ref #/definitions/AndType
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class AndType extends Type
{
    /**
     * @param list<Type> $items
     */
    public function __construct(
        public array $items,
    ) {}

    public static function getKind(): TypeKind
    {
        return TypeKind::AND;
    }
}