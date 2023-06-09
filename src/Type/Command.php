<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

/**
 * Represents a reference to a command. Provides a title which will be used to
 * represent a command in the UI and, optionally, an array of arguments which
 * will be passed to the command handler function when invoked.
 */
final class Command
{
    /**
     * @param string $title Title of the command, like `save`.
     * @param string $command The identifier of the actual command handler.
     * @param list<mixed>|null $arguments Arguments that the command handler
     *        should be invoked with.
     */
    public function __construct(
        public readonly string $title,
        public readonly string $command,
        public readonly ?array $arguments = null,
    ) {}
}
