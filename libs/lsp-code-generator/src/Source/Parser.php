<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\EnumStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\EnumValueStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\PropertyStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\StructureLiteralStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\StructureStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeAliasStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeKind;

/**
 * @psalm-suppress MixedArgument
 * @psalm-suppress InvalidOperand
 * @psalm-suppress TooFewArguments
 * @psalm-suppress ArgumentTypeCoercion
 *
 * @template-implements \IteratorAggregate<array-key, EnumStatement|StructureStatement|TypeAliasStatement>
 */
final class Parser implements \IteratorAggregate
{
    public function __construct(
        private readonly array $data
    ) {}

    public function getIterator(): \Traversable
    {
        foreach ($this->data['enumerations'] as $enumeration) {
            yield $this->parseEnumStatement($enumeration);
        }

        foreach ($this->data['structures'] as $structure) {
            yield $this->parseStructureStatement($structure);
        }

        foreach ($this->data['typeAliases'] as $alias) {
            yield $this->parseTypeAliasStatement($alias);
        }
    }

    private function parseTypeAliasStatement(array $data): TypeAliasStatement
    {
        return new TypeAliasStatement(...[...$data, ...[
            'documentation' => $this->formatDescription($data['documentation'] ?? null),
            'type' => $this->parseType($data['type']),
        ]]);
    }

    /**
     * @param array{kind: non-empty-string, ...} $data
     */
    private function parseType(array $data): Type
    {
        return match (TypeKind::from($data['kind'])) {
            TypeKind::REFERENCE => new Node\Type\ReferenceType($data['name']),
            TypeKind::BASE => new Node\Type\BaseType($data['name']),
            TypeKind::ARRAY => new Node\Type\ArrayType($this->parseType($data['element'])),
            TypeKind::OR => new Node\Type\OrType(\array_map($this->parseType(...), $data['items'])),
            TypeKind::AND => new Node\Type\AndType(\array_map($this->parseType(...), $data['items'])),
            TypeKind::MAP => new Node\Type\MapType($this->parseType($data['key']), $this->parseType($data['value'])),
            TypeKind::LITERAL => new Node\Type\StructureLiteralType(
                new StructureLiteralStatement(...[...$data['value'], ...[
                    'properties' => \array_map($this->parsePropertyStatement(...), $data['value']['properties']),
                    'documentation' => $this->formatDescription($data['value']['documentation'] ?? null),
                ]])
            ),
            TypeKind::STRING_LITERAL => new Node\Type\StringLiteralType($data['value']),
            TypeKind::INTEGER_LITERAL => new Node\Type\IntLiteralType($data['value']),
            TypeKind::BOOLEAN_LITERAL => new Node\Type\BoolLiteralType($data['value']),
            TypeKind::TUPLE => new Node\Type\TupleType(\array_map($this->parseType(...), $data['items'])),
        };
    }

    private function parseStructureStatement(array $data): StructureStatement
    {
        return new StructureStatement(...[...$data, ...[
            'properties' => \array_map($this->parsePropertyStatement(...), $data['properties']),
            'documentation' => $this->formatDescription($data['documentation'] ?? null),
            'extends' => \array_map($this->parseType(...), $data['extends'] ?? []),
            'mixins' => \array_map($this->parseType(...), $data['mixins'] ?? []),
        ]]);
    }

    private function parsePropertyStatement(array $data): PropertyStatement
    {
        return new PropertyStatement(...[...$data, ...[
            'documentation' => $this->formatDescription($data['documentation'] ?? null),
            'type' => $this->parseType($data['type']),
        ]]);
    }

    private function parseEnumStatement(array $data): EnumStatement
    {
        return new EnumStatement(...[...$data, ...[
            'documentation' => $this->formatDescription($data['documentation'] ?? null),
            'values' => \array_map(
                callback: $this->parseEnumValueStatement(...),
                array: $data['values'],
            ),
            'type' => $this->parseType($data['type']),
        ]]);
    }

    /**
     * @param array $data
     * @return EnumValueStatement
     */
    private function parseEnumValueStatement(array $data): EnumValueStatement
    {
        return new EnumValueStatement(...\array_merge($data, [
            'documentation' => $this->formatDescription($data['documentation'] ?? null),
        ]));
    }

    private function formatDescription(?string $description): ?string
    {
        if ($description === null) {
            return null;
        }

        $description = \preg_replace('/^@\w+[^\n]+/um', '', $description);
        $description = \preg_replace('/\n\h*(?!-)(?=\w)/um', ' ', $description);

        return \trim($description) ?: null;
    }
}
