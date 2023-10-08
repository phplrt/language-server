<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node;

use Phplrt\LanguageServer\CodeGenerator\Source\Node\Statement;

/**
 * Represents an object property.
 *
 * @json-schema-ref #/definitions/Property
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class PropertyStatement extends Statement
{
    /**
     * @param non-empty-string $name The property name.
     * @param Type $type The type of the property.
     * @param non-empty-string|null $deprecated Whether the property is
     *        deprecated or not. If deprecated the property contains
     *        the deprecation message.
     * @param non-empty-string|null $documentation An optional documentation.
     * @param bool $optional Whether the property is optional. If omitted,
     *        the property is mandatory.
     * @param bool $proposed Whether this is a proposed property. If omitted,
     *        the structure is final.
     * @param non-empty-string|null $since Since when (release number) this
     *        property is available. Is undefined if not known.
     */
    public function __construct(
        public readonly string $name,
        public Type $type,
        public ?string $deprecated = null,
        public ?string $documentation = null,
        public bool $optional = false,
        public bool $proposed = false,
        public ?string $since = null,
    ) {}
}
