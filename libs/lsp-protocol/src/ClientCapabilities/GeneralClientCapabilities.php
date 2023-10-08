<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities;

use Phplrt\LanguageServer\Protocol\ClientCapabilities\General\GeneralClientCapabilitiesStaleRequestSupport;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\General\MarkdownClientCapabilities;
use Phplrt\LanguageServer\Protocol\PositionEncodingKind;
use Phplrt\LanguageServer\Protocol\ClientCapabilities\General\RegularExpressionsClientCapabilities;

/**
 * General client capabilities.
 *
 * @since 3.16.0
 */
final class GeneralClientCapabilities
{
    /**
     * @param ?GeneralClientCapabilitiesStaleRequestSupport $staleRequestSupport
     *        Client capability that signals how the client handles stale requests
     *        (e.g. a request for which the client will not process the response
     *        anymore since the information is outdated).
     *        - {@since 3.17.0}
     * @param ?RegularExpressionsClientCapabilities $regularExpressions Client
     *        capabilities specific to regular expressions.
     *        - {@since 3.16.0}
     * @param ?MarkdownClientCapabilities $markdown Client capabilities specific to the
     *        client's markdown parser.
     *        - {@since 3.16.0}
     * @param ?list<PositionEncodingKind|non-empty-string> $positionEncodings The
     *        position encodings supported by the client. Client and server have to
     *        agree on the same position encoding to ensure that offsets
     *        (e.g. character position in a line) are interpreted the same on both
     *        sides.
     *        To keep the protocol backwards compatible the following applies: if the
     *        value 'utf-16' is missing from the array of position encodings servers
     *        can assume that the client supports UTF-16. UTF-16 is therefore a
     *        mandatory encoding.
     *        If omitted it defaults to ['utf-16'].
     *        Implementation considerations: since the conversion from one encoding
     *        into another requires the content of the file / line the conversion is
     *        best done where the file is read which is usually on the server side.
     *        - {@since 3.17.0}
     */
    public function __construct(
        public readonly ?GeneralClientCapabilitiesStaleRequestSupport $staleRequestSupport = null,
        public readonly ?RegularExpressionsClientCapabilities $regularExpressions = null,
        public readonly ?MarkdownClientCapabilities $markdown = null,
        public readonly ?array $positionEncodings = null,
    ) {}
}
