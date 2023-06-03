<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Dispatcher;

/**
 * @template TInput of object
 */
final class Action
{
    /**
     * @param class-string $type
     * @param \Closure(TInput):mixed $handler
     */
    public function __construct(
        public readonly string $type,
        public readonly \Closure $handler,
    ) {
    }
}
