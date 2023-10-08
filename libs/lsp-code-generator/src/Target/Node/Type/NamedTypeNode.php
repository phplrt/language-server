<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;

use Phplrt\LanguageServer\CodeGenerator\Target\Node\Name;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape\FieldNodeInterface;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Shape\FieldsListNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Template\ParameterNode;
use Phplrt\LanguageServer\CodeGenerator\Target\Node\Type\Template\ParametersListNode;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
class NamedTypeNode extends Type
{
    public readonly Name $name;

    public readonly ?ParametersListNode $parameters;

    public readonly ?FieldsListNode $fields;

    /**
     * @param Name|non-empty-string|iterable<array-key, non-empty-string> $name
     * @param ParametersListNode|iterable<array-key, ParameterNode>|null $parameters
     * @param FieldsListNode|iterable<array-key, FieldNodeInterface>|null $fields
     */
    public function __construct(
        self|string|iterable $name,
        ParametersListNode|iterable|null $parameters = null,
        FieldsListNode|iterable|null $fields = null,
    ) {
        $this->name = Name::new($name);
        $this->parameters = $parameters === null ? null : ParametersListNode::new($parameters);
        $this->fields = $fields === null ? null : FieldsListNode::new($fields);
    }
}
