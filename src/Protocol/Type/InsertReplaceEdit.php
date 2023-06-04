<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * A special text edit to provide an insert and a replace operation.
 *
 * @since 3.16.0
 */
final class InsertReplaceEdit
{
    /**
     * @param string $newText The string to be inserted.
     * @param Range $insert The range if the insert is requested.
     * @param Range $replace The range if the replace is requested.
     */
    public function __construct(
        public readonly string $newText,
        public readonly Range $insert,
        public readonly Range $replace,
    ) {
    }
}
