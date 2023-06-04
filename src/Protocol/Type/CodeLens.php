<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A code lens represents a {@see Command} command that should be shown along
 * with source text, like the number of references, a way to run tests, etc.
 *
 * A code lens is _unresolved_ when no command is associated to it. For
 * performance reasons the creation of a code lens and resolving should be
 * done in two stages.
 */
final class CodeLens
{
    /**
     * @param Range $range The range in which this code lens is valid. Should
     *        only span a single line.
     * @param Command|null $command The command this code lens represents.
     * @param mixed $data A data entry field that is preserved on a code
     *        lens item between a CodeLensRequest and a CodeLensResolveRequest.
     */
    public function __construct(
        public readonly Range $range,
        public readonly ?Command $command = null,
        public readonly mixed $data = null,
    ) {
    }
}
