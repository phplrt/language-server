<?php

declare(strict_types=1);

namespace Phplrt\RPC\Dispatcher;

/**
 * @template TInput of object
 */
final class Action
{
    /**
     * @param \Closure(TInput):mixed $handler
     */
    public function __construct(
        public readonly string $type,
        public readonly \Closure $handler,
    ) {
    }
}
