<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Statement as SourceStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\EnumStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\StructureStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\TypeAliasStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Parser;
use Phplrt\LanguageServer\CodeGenerator\Target\Transpiler;

/**
 * @template-implements \IteratorAggregate<array-key, CodeGeneratorInterface>
 */
final class Loader implements \IteratorAggregate
{
    /**
     * @var array<non-empty-string, SourceStatement>
     */
    private array $types = [];

    public function __construct(array $data)
    {
        // Load source statements
        foreach (new Parser($data) as $source) {
            $this->types[$source->name] = $source;
        }

        foreach(new Transpiler($this->types) as $target) {
            $this->types[$target->name] = $target;
        }
    }

    public function getIterator(): \Traversable
    {
        foreach ($this->types as $type) {
            $result = match (true) {
                $type instanceof EnumStatement => new EnumCodeGenerator($this->types, $type),
                $type instanceof StructureStatement => new StructCodeGenerator($this->types, $type),
                $type instanceof TypeAliasStatement => null,
                default => throw new \InvalidArgumentException(
                    \sprintf('Could not convert entry node of type "%s" to code generator', $type::class)
                ),
            };

            if ($result instanceof CodeGeneratorInterface) {
                yield $result;
            }
        }
    }

    /**
     * @psalm-taint-sink file $filename
     * @param non-empty-string $filename
     *
     * @throws \JsonException
     */
    public static function loadFromFile(string $filename): self
    {
        if (!\is_readable($filename)) {
            throw new \InvalidArgumentException('Could not read schema file');
        }

        $contents = \file_get_contents($filename);

        if (!\is_string($contents) || $contents === '') {
            throw new \InvalidArgumentException('An error occurred while reading file');
        }

        return self::loadFromJson($contents);
    }

    /**
     * @param non-empty-string $json
     *
     * @throws \JsonException
     */
    public static function loadFromJson(string $json): self
    {
        return self::loadFromArray((array)\json_decode($json, true, flags: \JSON_THROW_ON_ERROR));
    }

    public static function loadFromArray(array $data): self
    {
        return new self($data);
    }
}
