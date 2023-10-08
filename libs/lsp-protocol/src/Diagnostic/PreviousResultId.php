<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Diagnostic;

/**
 * A previous result id in a workspace pull request.
 *
 * @since 3.17.0
 */
final class PreviousResultId
{
    /**
     * @param string $uri The URI for which the client knowns a result id.
     * @param string $value The value of the previous result id.
     */
    public function __construct(
        public readonly string $uri,
        public readonly string $value,
    ) {}
}
