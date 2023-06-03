<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Message\IdFactory;

use Phplrt\LanguageServer\RPC\Exception\IdOverflowException;
use Phplrt\LanguageServer\RPC\Message\IdFactory\IntGenerator\OverflowBehaviour;
use Phplrt\LanguageServer\RPC\Message\IntIdentifier;

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
     * @return IntIdentifier<TInteger>
     * @throws IdOverflowException
     */
    public function generate(): IntIdentifier
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

        return new IntIdentifier($value);
    }
}
