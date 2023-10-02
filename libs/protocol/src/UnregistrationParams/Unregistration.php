<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\Protocol\UnregistrationParams;

/**
 * General parameters to unregister a request or notification.
 */
final class Unregistration
{
    /**
     * @param string $id The id used to unregister the request or notification.
     *        Usually an id provided during the register request.
     * @param string $method The method to unregister for.
     */
    public function __construct(
        public readonly string $id,
        public readonly string $method,
    ) {}
}
