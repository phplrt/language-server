<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator;

interface CodeGeneratorInterface extends \Stringable
{
    /**
     * @return non-empty-string
     */
    public function getName(): string;

    /**
     * Returns string representation of the generated code.
     */
    public function __toString(): string;
}
