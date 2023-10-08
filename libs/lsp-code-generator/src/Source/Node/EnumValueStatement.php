<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\CodeGenerator\Source\Node;

/**
 * Defines an enumeration entry.
 *
 * @json-schema-ref #/definitions/EnumerationEntry
 *
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal Phplrt\LanguageServer\CodeGenerator
 */
final class EnumValueStatement
{
    /**
     * @param non-empty-string $name The name of the enum item.
     * @param non-empty-string|int $value The value.
     * @param non-empty-string|null $deprecated Whether the enum entry is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     * @param non-empty-string|null $documentation An optional documentation.
     * @param bool $proposed Whether this is a proposed enumeration entry.
     *        If omitted, the enumeration entry is final.
     * @param non-empty-string|null $since Since when (release number) this
     *        enumeration entry is available. Is undefined if not known.
     */
    public function __construct(
        public readonly string $name,
        public string|int $value,
        public ?string $deprecated = null,
        public ?string $documentation = null,
        public bool $proposed = false,
        public ?string $since = null,
    ) {}
}
