<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\EnumStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\Statement as SourceStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\StructureStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type as SourceType;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type as TargetType;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Literal as TargetLiteral;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeAliasStatement;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\NamedTypeNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape as TargetShape;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Template as TargetTemplate;

final class TypeTranspiler
{
    /**
     * @param array<non-empty-string, SourceStatement> $types
     */
    public function __construct(
        private readonly array $types,
    ) {}

    public function convert(SourceType $type, bool $optional = false): TargetType
    {
        $result = $this->create($type);

        if ($optional) {
            return new TargetType\NullableTypeNode($result);
        }

        return $result;
    }

    private function create(SourceType $type): TargetType
    {
        return match (true) {
            $type instanceof SourceType\BaseType => $this->createBase($type),
            $type instanceof SourceType\ReferenceType => $this->createReference($type),
            $type instanceof SourceType\OrType => $this->createUnionType($type),
            $type instanceof SourceType\AndType => $this->createIntersectionType($type),
            $type instanceof SourceType\MapType => $this->createMapType($type),
            $type instanceof SourceType\TupleType => $this->createTupleType($type),
            $type instanceof SourceType\ArrayType => $this->createArrayType($type),
            $type instanceof SourceType\StructureLiteralType => $this->createObjectType($type),
            $type instanceof SourceType\StringLiteralType => $this->createStringLiteralType($type),
            $type instanceof SourceType\BoolLiteralType => $this->createBoolLiteralType($type),
            $type instanceof SourceType\IntLiteralType => $this->createIntLiteralType($type),
            default => throw new \InvalidArgumentException(
                \sprintf('Could not convert entry node of type "%s" to output format', $type::class)
            ),
        };
    }

    private function createStringLiteralType(SourceType\StringLiteralType $type): TargetLiteral\StringLiteralNode
    {
        return new TargetLiteral\StringLiteralNode($type->value);
    }

    private function createBoolLiteralType(SourceType\BoolLiteralType $type): TargetLiteral\BoolLiteralNode
    {
        return new TargetLiteral\BoolLiteralNode($type->value);
    }

    private function createIntLiteralType(SourceType\IntLiteralType $type): Statement
    {
        return new TargetLiteral\IntLiteralNode($type->value);
    }

    private function createUnionType(SourceType\OrType $type): TargetType\UnionTypeNode
    {
        $result = \array_map($this->create(...), $type->items);

        /** @psalm-suppress TooFewArguments */
        return new TargetType\UnionTypeNode(...$result);
    }

    private function createIntersectionType(SourceType\AndType $type): TargetType\IntersectionTypeNode
    {
        $result = \array_map($this->create(...), $type->items);

        /** @psalm-suppress TooFewArguments */
        return new TargetType\IntersectionTypeNode(...$result);
    }

    private function createObjectType(SourceType\StructureLiteralType $type): NamedTypeNode
    {
        if ($type->value->properties === []) {
            return new NamedTypeNode('object');
        }

        $fields = [];

        foreach ($type->value->properties as $property) {
            $field = new TargetShape\NamedFieldNode(
                name: new TargetLiteral\StringLiteralNode(
                    value: $property->name,
                ),
                of: new TargetShape\FieldNode(
                    value: $this->create($property->type),
                ),
            );

            if ($property->optional) {
                $field = new TargetShape\OptionalFieldNode($field);
            }

            $fields[] = $field;
        }

        return new NamedTypeNode(
            name: 'object',
            fields: new TargetShape\FieldsListNode($fields),
        );
    }

    private function createArrayType(SourceType\ArrayType $type): NamedTypeNode
    {
        return new NamedTypeNode(
            name: 'list',
            parameters: new TargetTemplate\ParametersListNode([
                new TargetTemplate\ParameterNode($this->create($type->element)),
            ]),
        );
    }

    private function createMapType(SourceType\MapType $type): NamedTypeNode
    {
        return new NamedTypeNode(
            name: 'array',
            parameters: new TargetTemplate\ParametersListNode([
                new TargetTemplate\ParameterNode($this->create($type->key)),
                new TargetTemplate\ParameterNode($this->create($type->value)),
            ]),
        );
    }

    private function createTupleType(SourceType\TupleType $type): NamedTypeNode
    {
        $fields = [];

        foreach ($type->items as $item) {
            $fields[] = new TargetShape\FieldNode($this->create($item));
        }

        return new NamedTypeNode(
            name: 'array',
            fields: new TargetShape\FieldsListNode($fields),
        );
    }

    private function createBase(SourceType\BaseType $type): NamedTypeNode
    {
        return match ($type->name) {
            'URI', 'DocumentUri', 'RegExp', 'string' => new NamedTypeNode('non-empty-string'),
            'integer' => new NamedTypeNode('int', new TargetTemplate\ParametersListNode([
                new TargetTemplate\ParameterNode(new TargetLiteral\IntLiteralNode(-2147483648)),
                new TargetTemplate\ParameterNode(new TargetLiteral\IntLiteralNode(2147483647)),
            ])),
            'uinteger' => new NamedTypeNode('int', new TargetTemplate\ParametersListNode([
                new TargetTemplate\ParameterNode(new TargetLiteral\IntLiteralNode(0)),
                new TargetTemplate\ParameterNode(new TargetLiteral\IntLiteralNode(2147483647)),
            ])),
            'decimal' => new NamedTypeNode('float'),
            'boolean' => new NamedTypeNode('bool'),
            'null' => new NamedTypeNode('null'),
            default => throw new \InvalidArgumentException(
                \sprintf( 'Invalid base node of type "%s"', $type->name),
            ),
        };
    }

    private function createReference(SourceType\ReferenceType $type): TargetType
    {
        /** @var StructureStatement|EnumStatement|TypeAliasStatement|null $reference */
        $reference = $this->types[$type->name] ?? null;

        if ($reference === null) {
            throw new \OutOfBoundsException(\sprintf('Referenced type "%s" not found', $type->name));
        }

        return match (true) {
            $type->name === 'LSPAny' => new NamedTypeNode('mixed'),
            $reference instanceof StructureStatement => $this->createStruct($reference),
            $reference instanceof EnumStatement => $this->createEnum($reference),
            $reference instanceof TypeAliasStatement => $this->create($reference->type),
            default => throw new \InvalidArgumentException(
                \sprintf('Invalid reference node of type "%s"', $reference::class)
            ),
        };
    }

    private function createEnum(EnumStatement $stmt): TargetType
    {
        $result = new NamedTypeNode($stmt->name);

        if ($stmt->supportsCustomValues) {
            return new TargetType\UnionTypeNode($result, $this->create($stmt->type));
        }

        return $result;
    }

    private function createStruct(StructureStatement $stmt): NamedTypeNode
    {
        return new NamedTypeNode($stmt->name);
    }
}
