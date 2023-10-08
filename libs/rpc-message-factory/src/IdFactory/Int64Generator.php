<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message\Factory\IdFactory;

use Phplrt\RPC\Message\Factory\Exception\IdNotSupportedException;
use Phplrt\RPC\Message\Factory\IdFactory;
use Phplrt\RPC\Message\Factory\IdFactory\IntGenerator\OverflowBehaviour;
use Phplrt\Contracts\RPC\Message\Factory\IdFactoryInterface;

/**
 * @template-extends IntGenerator<int<0, 9223372036854775807>>
 */
final class Int64Generator extends IntGenerator
{
    /**
     * Maximal int64 value
     */
    private const MAX_VALUE = 0x7FFF_FFFF_FFFF_FFFF;

    /**
     * Minimal int64 value
     */
    private const MIN_VALUE = -0x8000_0000_0000_0000;

    /**
     * @throws IdNotSupportedException If the current platform is not supported.
     */
    public function __construct(
        IdFactoryInterface $ids = new IdFactory(),
        OverflowBehaviour $onOverflow = OverflowBehaviour::EXCEPTION,
    ) {
        if (\PHP_INT_SIZE !== 8) {
            throw IdNotSupportedException::fromInvalidPlatform('int64', 'int32');
        }

        parent::__construct($ids, $onOverflow);
    }

    protected function getInitialValue(): int
    {
        return 0;
    }

    protected function getMaximalValue(): int
    {
        return self::MAX_VALUE;
    }
}
