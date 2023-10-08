<?php

declare(strict_types=1);

namespace Phplrt\Contracts\RPC\Message;

/**
 * RPC identifier representation.
 *
 * @template TValue of mixed
 */
interface IdInterface extends \Stringable
{
    /**
     * Checks the value object equivalence.
     */
    public function equals(self $id): bool;

    /**
     * Returns the primitive scalar value of the value object.
     *
     * @return TValue
     */
    public function toPrimitive(): mixed;
}
