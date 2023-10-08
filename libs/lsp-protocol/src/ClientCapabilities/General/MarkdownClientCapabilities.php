<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\General;

/**
 * Client capabilities specific to the used markdown parser.
 *
 * @since 3.16.0
 */
final class MarkdownClientCapabilities
{
    /**
     * @param string $parser The name of the parser.
     * @param ?string $version The version of the parser.
     * @param ?list<string> $allowedTags A list of HTML tags that the client
     *        allows / supports in Markdown.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly string $parser,
        public readonly ?string $version = null,
        public readonly ?array $allowedTags = null,
    ) {}
}
