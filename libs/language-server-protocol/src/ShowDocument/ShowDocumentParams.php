<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ShowDocument;

use Phplrt\LanguageServer\Protocol\Type\Range;

/**
 * Params to show a resource in the UI.
 *
 * @since 3.16.0
 */
final class ShowDocumentParams
{
    /**
     * @param string $uri The uri to show.
     * @param ?bool $external Indicates to show the resource in an external program. To
     *        show, for example, `https://code.visualstudio.com/` in the default WEB
     *        browser set {@see $external} to {@see true}.
     * @param ?bool $takeFocus An optional property to indicate whether the editor
     *        showing the document should take focus or not. Clients might ignore this
     *        property if an external program is started.
     * @param ?Range $selection An optional selection range if the document is a text
     *        document. Clients might ignore the property if an external program is
     *        started or the file is not a text file.
     */
    public function __construct(
        public readonly string $uri,
        public readonly ?bool $external = null,
        public readonly ?bool $takeFocus = null,
        public readonly ?Range $selection = null,
    ) {}
}
