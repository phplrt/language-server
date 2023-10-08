<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node;

/**
 * Defines the structure of an object literal.
 *
 * @json-schema-ref #/definitions/Structure
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class StructureStatement extends Statement
{
    /**
     * @param non-empty-string $name The name of the structure.
     * @param list<PropertyStatement> $properties The properties.
     * @param non-empty-string|null $deprecated Whether the structure is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     * @param non-empty-string|null $documentation An optional documentation.
     * @param list<Type> $extends Structures extended from. This structures
     *        form a polymorphic type hierarchy.
     * @param list<Type> $mixins Structures to mix in. The properties of these
     *        structures are `copied` into this structure. Mixins don't form
     *        a polymorphic type hierarchy in LSP.
     * @param bool $proposed Whether this is a proposed structure. If omitted,
     *        the structure is final.
     * @param non-empty-string|null $since Since when (release number) this
     *        structure is available. Is undefined if not known.
     */
    public function __construct(
        public readonly string $name,
        public array $properties = [],
        public ?string $deprecated = null,
        public ?string $documentation = null,
        public array $extends = [],
        public array $mixins = [],
        public bool $proposed = false,
        public ?string $since = null,
    ) {}
}
