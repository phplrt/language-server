<?php

declare(strict_types=1);

namespace Phplrt\RPC\Dispatcher\Attribute;

#[\Attribute(\Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
final class RpcMethod
{
    /**
     * @param class-string|null $type
     * @param non-empty-string|null $name
     */
    public function __construct(
        public readonly ?string $type = null,
        public readonly ?string $name = null,
    ) {
    }
}
