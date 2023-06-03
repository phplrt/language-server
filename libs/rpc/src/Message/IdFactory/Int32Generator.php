<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Message\IdFactory;

use Phplrt\LanguageServer\RPC\Message\IdFactory\IntGenerator\OverflowBehaviour;

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
        OverflowBehaviour $onOverflow = OverflowBehaviour::EXCEPTION,
    ) {
        parent::__construct($onOverflow);
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
