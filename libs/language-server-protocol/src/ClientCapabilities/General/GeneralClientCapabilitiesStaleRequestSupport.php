<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\ClientCapabilities\General;

final class GeneralClientCapabilitiesStaleRequestSupport
{
    /**
     * @param bool $cancel The client will actively cancel the request.
     * @param list<string> $retryOnContentModified The list of requests for
     *        which the client will retry the request if it receives a response
     *        with error code `ContentModified`
     */
    public function __construct(
        public readonly bool $cancel,
        public readonly array $retryOnContentModified,
    ) {}
}
