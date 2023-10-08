<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * Additional information that describes document changes.
 *
 * @since 3.16.0
 */
final class ChangeAnnotation
{
    /**
     * @param string $label A human-readable string describing the actual
     *        change. The string is rendered prominent in the user interface.
     * @param ?bool $needsConfirmation A flag which indicates that user
     *        confirmation is needed before applying the change.
     * @param ?string $description A human-readable string which is rendered
     *        less prominent in the user interface.
     */
    public function __construct(
        public readonly string $label,
        public readonly ?bool $needsConfirmation = null,
        public readonly ?string $description = null,
    ) {}
}
