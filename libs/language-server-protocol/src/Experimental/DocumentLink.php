<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Experimental;

use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * A document link is a range in a text document that links to an internal or
 * external resource, like another text document or a web site.
 *
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *              changed in the future.
 */
class DocumentLink
{
    /**
     * @param Range $range The range this link applies to.
     * @param ?string $target The uri this link points to. If missing a
     *        resolve request is sent later.
     * @param ?string $tooltip The tooltip text when you hover over this
     *        link.
     *        If a tooltip is provided, is will be displayed in a string that includes
     *        instructions on how to trigger the link, such as `{0} (ctrl + click)`.
     *        The specific instructions vary depending on OS, user settings, and
     *        localization.
     *        - {@since 3.15.0}
     * @param mixed $data A data entry field that is preserved on a document link
     *        between a DocumentLinkRequest and a DocumentLinkResolveRequest.
     */
    public function __construct(
        public readonly Range $range,
        public readonly ?string $target = null,
        public readonly ?string $tooltip = null,
        public readonly mixed $data = null,
    ) {}
}
