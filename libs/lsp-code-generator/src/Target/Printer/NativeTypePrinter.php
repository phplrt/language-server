<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Printer;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\CallableTypeNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\ClassConstMaskNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\ClassConstNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\ConstMaskNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\IntersectionTypeNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\NamedTypeNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\UnionTypeNode;

class NativeTypePrinter extends PhpDocTypePrinter
{
    protected function printClassConstMaskNode(ClassConstMaskNode $node): string
    {
        return 'int';
    }

    protected function printConstMaskNode(ConstMaskNode $node): string
    {
        return 'int';
    }

    protected function printClassConstNode(ClassConstNode $node): string
    {
        return 'mixed';
    }

    protected function printUnionTypeNode(UnionTypeNode $node): string
    {
        try {
            /** @var non-empty-string */
            return \vsprintf($this->nesting > 0 ? '(%s)' : '%s', [
                \implode('|', [...$this->unwrapAndPrint($node)])
            ]);
        } finally {
            ++$this->nesting;
        }
    }

    protected function printIntersectionTypeNode(IntersectionTypeNode $node): string
    {
        try {
            /** @var non-empty-string */
            return \vsprintf($this->nesting > 0 ? '(%s)' : '%s', [
                \implode('&', [...$this->unwrapAndPrint($node)])
            ]);
        } finally {
            ++$this->nesting;
        }
    }

    protected function printCallableTypeNode(CallableTypeNode $node): string
    {
        return match ($result = $node->name->toString()) {
            'pure-callable' => 'callable',
            'pure-Closure' => 'Closure',
            default => $result,
        };
    }

    protected function printNamedTypeNode(NamedTypeNode $node): string
    {
        return match ($result = $node->name->toString()) {
            'never-return',
            'never-returns',
            'no-return',
                => 'never',
            'value-of',
                => 'mixed',
            'int-mask',
            'int-mask-of',
            'literal-int',
            'positive-int',
            'non-positive-int',
            'non-negative-int',
            'non-zero-int',
                => 'int',
            'array-key',
            'key-of',
                => 'int|string',
            'numeric',
                => 'int|float|string',
            'list',
            'non-empty-list',
                => 'array',
            'class-string',
            'interface-string',
            'trait-string',
            'enum-string',
            'callable-string',
            'numeric-string',
            'literal-string',
            'non-empty-string',
            'lowercase-string',
            'non-empty-lowercase-string',
            'truthy-string',
            'non-falsy-string',
                => 'string',
            'scalar' => 'string|float|bool|int',
            default => $result,
        };
    }
}
