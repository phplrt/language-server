<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol;

/**
 * The `client/registerCapability` request is sent from the server to the client
 * to register for a new capability on the client side. Not all clients need to
 * support dynamic capability registration. A client opts in via the
 * `dynamicRegistration` property on the specific client capabilities. A client
 * can even provide dynamic registration for capability A but not for
 * capability B (see {@see TextDocumentClientCapabilities} as an example).
 *
 * Server must not register the same capability both statically through the
 * initialize result and dynamically for the same document selector. If a
 * server wants to support both static and dynamic registration it needs to
 * check the client capability in the initialize request and only register the
 * capability statically if the client doesn’t support dynamic registration
 * for that capability.
 *
 * Request:
 *  - method: ‘client/registerCapability’
 *  - params: RegistrationParams
 *
 * @link https://microsoft.github.io/language-server-protocol/specifications/lsp/3.17/specification/#client_registerCapability
 */
final class RegistrationParams
{
    /**
     * @param list<Registration> $registrations
     */
    public function __construct(
        public readonly array $registrations,
    ) {}
}
