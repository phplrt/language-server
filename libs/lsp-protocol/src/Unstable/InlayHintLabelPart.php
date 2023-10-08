<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\Unstable;

use Phplrt\LanguageServer\Protocol\Type\Command;
use Phplrt\LanguageServer\Protocol\Type\Location;
use Phplrt\LanguageServer\Protocol\Type\MarkupContent;

/**
 * An inlay hint label part allows for interactive and composite labels of inlay
 * hints.
 *
 * @since 3.17.0
 * @deprecated This is a stub, has not been tested on real behaviour and may be
 *             changed in the future.
 */
class InlayHintLabelPart
{
    /**
     * @param string $value The value of this label part.
     * @param string|MarkupContent|null $tooltip The tooltip text when you
     *        hover over this label part. Depending on the client capability
     *        `inlayHint.resolveSupport` clients might resolve this property late using
     *        the resolve request.
     * @param ?Location $location An optional source code location that represents this
     *        label part.
     *         The editor will use this location for the hover and for code navigation
     *        features: This part will become a clickable link that resolves to the
     *        definition of the symbol at the given location (not necessarily the
     *        location itself), it shows the hover that shows at the given location,
     *        and it shows a context menu with further code navigation commands.
     *         Depending on the client capability `inlayHint.resolveSupport` clients
     *        might resolve this property late using the resolve request.
     * @param ?Command $command An optional command for this label part.
     *         Depending on the client capability `inlayHint.resolveSupport` clients
     *        might resolve this property late using the resolve request.
     */
    public function __construct(
        public readonly string $value,
        public readonly string|MarkupContent|null $tooltip = null,
        public readonly ?Location $location = null,
        public readonly ?Command $command = null,
    ) {}
}
