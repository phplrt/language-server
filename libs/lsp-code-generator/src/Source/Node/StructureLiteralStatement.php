<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Statement;

/**
 * Defines an unnamed structure of an object literal.
 *
 * @json-schema-ref #/definitions/StructureLiteral
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class StructureLiteralStatement extends Statement
{
    /**
     * @param list<PropertyStatement> $properties The properties.
     * @param non-empty-string|null $deprecated Whether the literal is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     * @param non-empty-string|null $documentation An optional documentation.
     * @param bool $proposed Whether this is a proposed structure.
     *        If omitted, the structure is final.
     * @param non-empty-string|null $since Since when (release number) this
     *        structure is available. Is undefined if not known.
     */
    public function __construct(
        public array $properties = [],
        public ?string $deprecated = null,
        public ?string $documentation = null,
        public bool $proposed = false,
        public ?string $since = null,
    ) {}
}
