<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\EnumStatement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\Statement;

/**
 * @template-extends CodeGenerator<EnumStatement>
 */
final class EnumCodeGenerator extends CodeGenerator
{
    /**
     * @param array<array-key, Statement> $types
     */
    public function __construct(array $types, EnumStatement $ctx)
    {
        parent::__construct($types, $ctx);
    }

    public function getName(): string
    {
        return $this->ctx->name;
    }

    public function __toString(): string
    {
        return $this->render('enum.php.twig');
    }
}
