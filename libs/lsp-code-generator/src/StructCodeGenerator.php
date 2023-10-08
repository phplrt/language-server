<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Statement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\StructureStatement;

/**
 * @template-extends CodeGenerator<StructureStatement>
 */
final class StructCodeGenerator extends CodeGenerator
{
    /**
     * @param array<array-key, Statement> $types
     */
    public function __construct(array $types, StructureStatement $ctx)
    {
        parent::__construct($types, $ctx);
    }

    public function getName(): string
    {
        return $this->ctx->name;
    }

    public function __toString(): string
    {
        return $this->render('struct.php.twig');
    }
}
