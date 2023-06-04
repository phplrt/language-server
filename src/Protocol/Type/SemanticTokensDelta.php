<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Type;

/**
 * @since 3.16.0
 *
 * @deprecated NOT IMPLEMENTED YET
 */
final class SemanticTokensDelta
{
    /**
     * @param string|null $resultId
     * @param list<SemanticTokensEdit> $edits The semantic token edits to
     *        transform a previous result into a new result.
     */
    public function __construct(
        public readonly ?string $resultId,
        public readonly array $edits,
    ) {
    }
}
