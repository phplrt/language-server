<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\MarkupKind;

/**
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class HoverClientCapabilities
{
    /**
     * @param ?bool $dynamicRegistration Whether hover supports dynamic registration.
     * @param ?list<MarkupKind> $contentFormat Client supports the following content
     *        formats for the content property. The order describes the preferred
     *        format of the client.
     */
    public function __construct(
        public readonly ?bool $dynamicRegistration = null,
        public readonly ?array $contentFormat = null,
    ) {}
}
