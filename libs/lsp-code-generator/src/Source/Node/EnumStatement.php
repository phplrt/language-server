<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Type\BaseType;

/**
 * Defines an enumeration.
 *
 * @json-schema-ref #/definitions/Enumeration
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class EnumStatement extends Statement
{
    /**
     * @param non-empty-string $name
     * @param BaseType<'string'|'integer'|'uinteger'> $type
     * @param list<EnumValueStatement> $values
     * @param non-empty-string|null $deprecated
     * @param non-empty-string|null $documentation
     * @param non-empty-string|null $since
     */
    public function __construct(
        public readonly string $name,
        public BaseType $type,
        public array $values = [],
        public ?string $deprecated = null,
        public ?string $documentation = null,
        public bool $proposed = false,
        public ?string $since = null,
        public bool $supportsCustomValues = false,
    ) {}
}
