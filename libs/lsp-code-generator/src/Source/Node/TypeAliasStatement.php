<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node;

/**
 * Defines a type alias. (e.g. `type Definition = Location | LocationLink`).
 *
 * @json-schema-ref #/definitions/TypeAlias
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class TypeAliasStatement extends Statement
{
    /**
     * @param non-empty-string $name The name of the type alias.
     * @param Type $type The aliased type.
     * @param non-empty-string|null $deprecated Whether the type alias is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     * @param non-empty-string|null $documentation An optional documentation.
     * @param bool $proposed Whether this is a proposed type alias. If omitted,
     *        the type alias is final.
     * @param non-empty-string|null $since Since when (release number) this
     *        structure is available. Is undefined if not known.
     */
    public function __construct(
        public readonly string $name,
        public Type $type,
        public ?string $deprecated = null,
        public ?string $documentation = null,
        public bool $proposed = false,
        public ?string $since = null,
    ) {}
}
