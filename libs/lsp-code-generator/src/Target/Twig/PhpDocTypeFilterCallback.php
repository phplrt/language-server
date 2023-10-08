<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Target\Twig;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Statement;
use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type;
use Phplrt\LanguageServer\CodeGenerator\Target\Printer\PhpDocTypePrinter;
use Phplrt\LanguageServer\CodeGenerator\Target\TypeTranspiler;

final class PhpDocTypeFilterCallback
{
    private readonly PhpDocTypePrinter $printer;
    private readonly TypeTranspiler $transpiler;

    /**
     * @param array<non-empty-string, Statement> $types
     */
    public function __construct(array $types)
    {
        $this->printer = new PhpDocTypePrinter();
        $this->transpiler = new TypeTranspiler($types);
    }

    public function __invoke(Type $type, bool $optional = false): MultilineResult
    {
        return MultilineResult::fromGenerator(function () use ($type, $optional): iterable {
            $result = $this->printer->print(
                $this->transpiler->convert($type, $optional),
            );

            return \explode("\n", $result);
        });
    }
}
