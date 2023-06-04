<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Type;

interface CodeActionKindInterface
{
    /**
     * Returns the kind of a code action.
     *
     * Kinds are a hierarchical list of identifiers separated by `.`, e.g.
     * `"refactor.extract.function"`.
     *
     * The set of kinds is open and client needs to announce the kinds it
     * supports to the server during initialization.
     *
     * @return string
     */
    public function getActionName(): string;
}
