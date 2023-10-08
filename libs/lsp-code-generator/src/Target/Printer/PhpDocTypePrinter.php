<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Printer;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Statement;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Literal\LiteralNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable\ArgumentNodeInterface;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable\NamedArgumentNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable\OptionalArgumentNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable\OutArgumentNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Callable\VariadicArgumentNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\CallableTypeNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\ClassConstMaskNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\ClassConstNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\ConstMaskNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\IntersectionTypeNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\NamedTypeNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\NullableTypeNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape\FieldNodeInterface;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape\FieldsListNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape\NamedFieldNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape\NumericFieldNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape\OptionalFieldNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Template\ParameterNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Template\ParametersListNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\UnionTypeNode;

class PhpDocTypePrinter extends Printer
{
    /**
     * @return non-empty-string
     */
    protected function make(Statement $stmt): string
    {
        return match (true) {
            $stmt instanceof LiteralNode => $this->printLiteralNode($stmt),
            $stmt instanceof NamedTypeNode => $this->printNamedTypeNode($stmt),
            $stmt instanceof ClassConstMaskNode => $this->printClassConstMaskNode($stmt),
            $stmt instanceof ConstMaskNode => $this->printConstMaskNode($stmt),
            $stmt instanceof ClassConstNode => $this->printClassConstNode($stmt),
            $stmt instanceof CallableTypeNode => $this->printCallableTypeNode($stmt),
            $stmt instanceof UnionTypeNode => $this->printUnionTypeNode($stmt),
            $stmt instanceof IntersectionTypeNode => $this->printIntersectionTypeNode($stmt),
            $stmt instanceof NullableTypeNode => $this->printNullableTypeNode($stmt),
            default => throw new \InvalidArgumentException(
                \sprintf('Non-printable node "%s"', $stmt::class),
            ),
        };
    }

    /**
     * @return non-empty-string
     */
    protected function printNullableTypeNode(NullableTypeNode $node): string
    {
        if ($node->type instanceof NamedTypeNode) {
            $result = $this->make($node->type);

            if ($result === 'mixed') {
                return $result;
            }

            return '?' . $result;
        }

        return $this->make(new UnionTypeNode(
            first: $node->type,
            second: new NamedTypeNode('null'),
        ));
    }

    /**
     * @return non-empty-string
     */
    protected function printClassConstMaskNode(ClassConstMaskNode $node): string
    {
        /** @var non-empty-string */
        return \vsprintf('%s::%s', [
            $node->class->toString(),
            (string)$node->constant . '*',
        ]);
    }

    /**
     * @return non-empty-string
     */
    protected function printClassConstNode(ClassConstNode $node): string
    {
        /** @var non-empty-string */
        return \vsprintf('%s::%s', [
            $node->class->toString(),
            (string)$node->constant,
        ]);
    }

    /**
     * @return non-empty-string
     */
    protected function printConstMaskNode(ConstMaskNode $node): string
    {
        return $node->name->toString() . '*';
    }

    /**
     * @return non-empty-string
     */
    protected function printCallableTypeNode(CallableTypeNode $node): string
    {
        $this->nesting = 0;

        $result = $node->name->toString();

        $arguments = [];

        [$before, $this->nesting] = [$this->nesting, 0];
        try {
            foreach ($node->arguments as $argument) {
                $arguments[] = \rtrim($this->printCallableArgumentNode($argument));
            }
        } finally {
            $this->nesting = $before;
        }

        // Add arguments
        $result .= \sprintf('(%s)', \implode(', ', $arguments));

        // Add return type
        if ($node->type !== null) {
            $returnType = $this->make($node->type);

            if ($this->shouldWrapReturnType($returnType)) {
                $returnType = \sprintf('(%s)', $returnType);
            }

            $result .= \sprintf(': %s', $returnType);
        }

        return $result;
    }

    /**
     * @return non-empty-string
     */
    protected function printCallableArgumentNode(ArgumentNodeInterface $node): string
    {
        return match (true) {
            $node instanceof OptionalArgumentNode
                => $this->printCallableArgumentNode($node->of) . '=',
            $node instanceof NamedArgumentNode
                => $this->printCallableArgumentNode($node->of) . $node->name->getRawValue(),
            $node instanceof OutArgumentNode
                => \rtrim($this->printCallableArgumentNode($node->of)) . '& ',
            $node instanceof VariadicArgumentNode
                => $this->printCallableArgumentNode($node->of) . '...',
            default => $this->make($node->getType()) . ' ',
        };
    }

    private function shouldWrapReturnType(string $value): bool
    {
        // Should return "false" in case of return type already
        // has been wrapped by round brackets.
        $isAlreadyWrapped = \str_starts_with($value, '(')
            && \str_ends_with($value, ')');

        if ($isAlreadyWrapped) {
            return false;
        }

        // Should return "true" in case of return type contains
        // union or intersection types.
        return \str_contains($value, '|')
            || \str_contains($value, '&');
    }

    /**
     * @return non-empty-string
     */
    protected function printUnionTypeNode(UnionTypeNode $node): string
    {
        try {
            /** @var non-empty-string */
            return \vsprintf($this->nesting > 0 ? '(%s)' : '%s', [
                \implode('|', [
                    ...$this->unwrapAndPrint($node),
                ]),
            ]);
        } finally {
            ++$this->nesting;
        }
    }

    /**
     * @return non-empty-string
     */
    protected function printIntersectionTypeNode(IntersectionTypeNode $node): string
    {
        try {
            /** @var non-empty-string */
            return \vsprintf($this->nesting > 0 ? '(%s)' : '%s', [
                \implode(' & ', [
                    ...$this->unwrapAndPrint($node),
                ]),
            ]);
        } finally {
            ++$this->nesting;
        }
    }

    /**
     * @return non-empty-string
     */
    protected function printLiteralNode(LiteralNode $node): string
    {
        /** @var non-empty-string */
        return $node->getRawValue();
    }

    /**
     * @return non-empty-string
     */
    protected function printNamedTypeNode(NamedTypeNode $node): string
    {
        $result = $node->name->toString();

        if ($node->parameters !== null) {
            $result .= $this->printTemplateParametersNode($node->parameters);
        }

        if ($node->fields !== null) {
            $result .= $this->printShapeFieldsNode($node->fields);
        }

        return $result;
    }

    /**
     * @return non-empty-string
     */
    protected function printTemplateParametersNode(ParametersListNode $params): string
    {
        $result = [];

        [$before, $this->nesting] = [$this->nesting, 0];
        try {
            foreach ($params->list as $param) {
                $result[] = $this->printTemplateParameterNode($param);
            }
        } finally {
            $this->nesting = $before;
        }

        return \sprintf('<%s>', \implode(', ', $result));
    }

    /**
     * @return non-empty-string
     */
    protected function printTemplateParameterNode(ParameterNode $param): string
    {
        return $this->make($param->value);
    }

    /**
     * @return non-empty-string
     */
    protected function printShapeFieldsNode(FieldsListNode $shape): string
    {
        $fields = $this->nested(function () use ($shape): array {
            $prefix = $this->newLine . $this->prefix();

            $fields = [];

            foreach ($shape->list as $field) {
                $fields[] = $prefix . $this->printShapeFieldNode($field);
            }

            if (!$shape->sealed) {
                $fields[] = $prefix . '...';
            }

            /** @var list<non-empty-string> */
            return $fields;
        });

        /** @var non-empty-string */
        return \vsprintf('{%s%s}', [
            \implode(',', $fields),
            $this->newLine . $this->prefix(),
        ]);
    }

    /**
     * @return non-empty-string
     */
    protected function printShapeFieldNode(FieldNodeInterface $field): string
    {
        $name = $this->printShapeFieldName($field);
        $value = $this->make($field->getValue());

        if ($name !== '') {
            /** @var non-empty-string */
            return \sprintf('%s: %s', $name, $value);
        }

        return $value;
    }

    private function printShapeFieldName(FieldNodeInterface $field): string
    {
        return match (true) {
            $field instanceof OptionalFieldNode
                => $this->printShapeFieldName($field->of) . '?',
            $field instanceof NumericFieldNode
                => $this->printShapeFieldName($field->of) . $field->index->getRawValue(),
            $field instanceof NamedFieldNode
                => $this->printShapeFieldName($field->of) . $field->name->getRawValue(),
            default => '',
        };
    }
}
