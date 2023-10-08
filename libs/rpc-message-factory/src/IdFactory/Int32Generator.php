<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message\Factory\IdFactory;

use Phplrt\RPC\Message\Factory\IdFactory;
use Phplrt\RPC\Message\Factory\IdFactory\IntGenerator\OverflowBehaviour;
use Phplrt\Contracts\RPC\Message\Factory\IdFactoryInterface;

/**
 * The most compatible generator with all subsystems and platforms.
 *
 * @template-extends IntGenerator<int<0, 2147483647>>
 */
final class Int32Generator extends IntGenerator
{
    /**
     * Maximal int32 value
     */
    private const MAX_VALUE = 0x7FFF_FFFF;

    /**
     * Minimal int32 value
     */
    private const MIN_VALUE = -0x8000_0000;

    public function __construct(
        IdFactoryInterface $ids = new IdFactory(),
        OverflowBehaviour $onOverflow = OverflowBehaviour::EXCEPTION,
    ) {
        parent::__construct($ids,$onOverflow);
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
