<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ShowDocument;

/**
 * The result of a showDocument request.
 *
 * @since 3.16.0
 */
final class ShowDocumentResult
{
    /**
     * @param bool $success A boolean indicating if the show was successful.
     */
    public function __construct(
        public readonly bool $success,
    ) {}
}
