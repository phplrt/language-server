<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\PropertyStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\Statement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\StructureStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type\ReferenceType;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeAliasStatement;

/**
 * @template-implements \IteratorAggregate<array-key, Statement>
 */
final class Transpiler implements \IteratorAggregate
{
    private const TRAITS = [
        'StaticRegistrationOptions',
        'TextDocumentRegistrationOptions',
        'WorkDoneProgressOptions',
        'WorkDoneProgressParams',
        'PartialResultParams',
    ];

    /**
     * @var array<non-empty-string, Statement>
     */
    private array $source;

    /**
     * @param array<non-empty-string, Statement> $types
     */
    public function __construct(
        private array $types = [],
    ) {
        $this->source = $this->types;
    }

    private function applyStructure(StructureStatement $stmt): ?StructureStatement
    {
        $this->applyTraits($stmt);
        $this->resolveStructReferences($stmt);
        $this->extractInlineTypes($stmt);

        // Hide traits from output
        if (\in_array($stmt->name, self::TRAITS, true)) {
            return null;
        }

        return $stmt;
    }

    private function extractInlineTypes(StructureStatement $stmt): void
    {
        foreach ($stmt->properties as $property) {
            $reference = $this->extractInlineType($stmt, $property, $property->type);

            if ($reference !== null) {
                $property->type = $reference;
            }
        }
    }

    /**
     * @return non-empty-string
     */
    private function createInlineStructName(StructureStatement $ctx, PropertyStatement $stmt): string
    {
        return $ctx->name . \ucfirst($stmt->name);
    }

    private function extractInlineType(StructureStatement $ctx, PropertyStatement $stmt, Type|Statement $type): ?ReferenceType
    {
        switch (true) {
            case $type instanceof Type\StructureLiteralType:
                if ($type->value->properties === []) {
                    return null;
                }

                $ctx = new StructureStatement(
                    name: $this->createInlineStructName($ctx, $stmt),
                    properties: $type->value->properties,
                    deprecated: $type->value->deprecated,
                    documentation: $type->value->documentation,
                    proposed: $type->value->proposed,
                    since: $type->value->since,
                );

                $this->source[$ctx->name] = $this->types[$ctx->name] = $ctx;

                foreach ($ctx->properties as $prop) {
                    if ($result = $this->extractInlineType($ctx, $prop, $prop->type)) {
                        $prop->type = $result;
                    }
                }

                return new ReferenceType($ctx->name);
            case $type instanceof Type\ArrayType:
                if ($result = $this->extractInlineType($ctx, $stmt, $type->element)) {
                    $type->element = $result;
                }
                return null;
            case $type instanceof Type\MapType:
                if ($result = $this->extractInlineType($ctx, $stmt, $type->value)) {
                    $type->value = $result;
                }
                return null;
            case $type instanceof ReferenceType:
                if ($type->name === 'LSPAny') {
                    return null;
                }

                $reference = $this->types[$type->name] ?? $this->source[$type->name];

                if ($reference instanceof TypeAliasStatement) {
                    return $this->extractInlineType($ctx, $stmt, $reference->type);
                }

                return null;
            case $type instanceof Type\TupleType:
            case $type instanceof Type\OrType:
            case $type instanceof Type\AndType:
                foreach ($type->items as $i => $item) {
                    if ($result = $this->extractInlineType($ctx, $stmt, $item)) {
                        $type->items[$i] = $result;
                    }
                }
                return null;
        }

        return null;
    }

    /**
     * Replace ReferenceType from "extends" and "mixins" to the full definition.
     */
    private function resolveStructReferences(StructureStatement $stmt): void
    {
        foreach ($stmt->extends as $i => $extension) {
            if ($extension instanceof ReferenceType) {
                $stmt->extends[$i] = $this->source[$extension->name];
            }
        }

        foreach ($stmt->mixins as $i => $mixin) {
            if ($mixin instanceof ReferenceType) {
                $stmt->mixins[$i] = $this->source[$mixin->name];
            }
        }
    }

    /**
     * Move all traits to "mixins" and use "extends" for other types.
     */
    private function applyTraits(StructureStatement $stmt): void
    {
        $types = [...$stmt->extends, ...$stmt->mixins];

        $stmt->extends = $stmt->mixins = [];

        foreach ($types as $type) {
            if (\in_array($type->name, self::TRAITS, true)) {
                $stmt->mixins[] = $type;
            } else {
                $stmt->extends[] = $type;
            }
        }
    }

    public function getIterator(): \Traversable
    {
        while ($this->types !== []) {
            $type = \array_pop($this->types);

            $type = match (true) {
                $type instanceof StructureStatement => $this->applyStructure($type),
                default => $type,
            };

            if ($type !== null) {
                yield $type;
            }
        }
    }
}
