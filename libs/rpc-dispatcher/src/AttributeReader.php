<?php

declare(strict_types=1);

namespace Phplrt\RPC\Dispatcher;

use Phplrt\RPC\Dispatcher\Attribute\RpcMethod;

/**
 * @template TContext of object
 *
 * @template-implements \IteratorAggregate<non-empty-string, Action>
 */
final class AttributeReader implements \IteratorAggregate
{
    /**
     * @var \ReflectionObject<TContext>
     */
    private readonly \ReflectionObject $reflection;

    /**
     * @param TContext $context
     */
    public function __construct(
        private readonly object $context,
    ) {
        $this->reflection = new \ReflectionObject($context);
    }

    private function getMethodType(\ReflectionMethod $reflection, RpcMethod $method): string
    {
        if ($method->type !== null) {
            return $method->type;
        }

        foreach ($reflection->getParameters() as $parameter) {
            $type = $parameter->getType();

            if (!$type instanceof \ReflectionNamedType) {
                throw new \InvalidArgumentException('Method argument cannot be union or intersection type');
            }

            return $type->getName();
        }

        return \stdClass::class;
    }

    /**
     * @return iterable<\ReflectionMethod, RpcMethod>
     */
    private function getMethods(\ReflectionObject $reflection): iterable
    {
        foreach ($reflection->getMethods() as $method) {
            foreach ($method->getAttributes(RpcMethod::class) as $attribute) {
                yield $method => $attribute->newInstance();
            }
        }
    }

    public function getIterator(): \Traversable
    {
        foreach ($this->getMethods($this->reflection) as $method => $attribute) {
            /** @var non-empty-string $name */
            $name = $attribute->name ?? $method->getName();

            /** @psalm-suppress MixedArgumentTypeCoercion */
            yield $name => new Action(
                type: $this->getMethodType($method, $attribute),
                handler: $method->getClosure($this->context),
            );
        }
    }
}
