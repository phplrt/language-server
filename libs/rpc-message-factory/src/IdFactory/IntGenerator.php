<?php

declare(strict_types=1);

namespace Phplrt\RPC\Message\Factory\IdFactory;

use Phplrt\RPC\Message\Factory\Exception\IdOverflowException;
use Phplrt\RPC\Message\Factory\IdFactory;
use Phplrt\RPC\Message\Factory\IdFactory\IntGenerator\OverflowBehaviour;
use Phplrt\RPC\Message\Factory\IdFactoryInterface;
use Phplrt\RPC\Message\IdInterface;

/**
 * @template TInteger of int
 */
abstract class IntGenerator implements GeneratorInterface
{
    /**
     * @var TInteger
     */
    private int $current;

    /**
     * @var TInteger
     */
    private readonly int $initial;

    /**
     * @var TInteger
     */
    private readonly int $maximum;

    public function __construct(
        private readonly IdFactoryInterface $ids = new IdFactory(),
        private readonly OverflowBehaviour $onOverflow = OverflowBehaviour::EXCEPTION,
    ) {
        $this->current = $this->initial = $this->getInitialValue();
        $this->maximum = $this->getMaximalValue();
    }

    /**
     * @return TInteger
     */
    abstract protected function getInitialValue(): int;

    /**
     * @return TInteger
     */
    abstract protected function getMaximalValue(): int;

    /**
     * @throws IdOverflowException
     */
    protected function reset(): void
    {
        if ($this->onOverflow === OverflowBehaviour::EXCEPTION) {
            throw IdOverflowException::fromMaxValueOfClass(static::class, (string)$this->current);
        }

        $this->current = $this->initial;
    }

    /**
     * @return IdInterface<TInteger>
     * @throws IdOverflowException
     */
    public function nextId(): IdInterface
    {
        /**
         * @psalm-suppress InvalidPropertyAssignmentValue: Overflow and conversion
         *                 to float is controlled by the "if" condition below.
         * @var TInteger $value
         */
        $value = ++$this->current;

        if ($value >= $this->maximum) {
            $this->reset();
        }

        return $this->ids->createFromInt($value);
    }
}
