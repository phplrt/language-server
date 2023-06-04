<?php

declare(strict_types=1);

namespace Phplrt\RPC\Dispatcher;

use Phplrt\RPC\Dispatcher\Attribute\RpcMethod;
use Phplrt\RPC\Hydrator\ExtractorInterface;
use Phplrt\RPC\Hydrator\HydratorInterface;
use Phplrt\RPC\Message\FailureResponseInterface;
use Phplrt\RPC\Message\IdentifiableInterface;
use Phplrt\RPC\Message\IdFactoryInterface;
use Phplrt\RPC\Message\IdInterface;
use Phplrt\RPC\Message\NotificationInterface;
use Phplrt\RPC\Message\RequestInterface;
use Phplrt\RPC\Message\ResponseFactoryInterface;
use Phplrt\RPC\Message\ResponseInterface;

/**
 * @template TContext of object
 */
final class AttributeAwareDispatcher implements DispatcherInterface
{
    /**
     * @var list<non-empty-string>
     */
    private const PROCEDURE_RETURN_TYPES = [
        'void',
        'never',
    ];

    /**
     * @var array<non-empty-string, Action>
     */
    private array $methods = [];

    /**
     * @var array<non-empty-string, Action>
     */
    private array $procedures = [];

    /**
     * @param TContext $context
     */
    public function __construct(
        private readonly object $context,
        private readonly HydratorInterface $hydrator,
        private readonly ExtractorInterface $extractor,
        private readonly ResponseFactoryInterface $responses,
        private readonly IdFactoryInterface $ids,
    ) {
        $reflection = new \ReflectionObject($this->context);

        foreach ($this->getMethods($reflection) as $method => $attribute) {
            /** @var non-empty-string $name */
            $name = $attribute->name ?? $method->getName();

            $action = new Action(
                type: $this->getMethodType($method, $attribute),
                handler: $method->getClosure($this->context),
            );

            if ($this->isProcedure($method)) {
                $this->procedures[$name] = $action;
            }

            $this->methods[$name] = $action;
        }
    }

    /**
     * @return class-string
     */
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

    private function isProcedure(\ReflectionMethod $method): bool
    {
        $type = $method->getReturnType();

        return $type instanceof \ReflectionNamedType
            && $type->isBuiltin()
            && \in_array($type->getName(), self::PROCEDURE_RETURN_TYPES, true)
        ;
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

    private function getMethodAction(NotificationInterface $notify): Action
    {
        return $this->methods[$notify->getMethod()]
            ?? throw new \BadMethodCallException(
                \sprintf('RPC method "%s" not found', $notify->getMethod()),
                -32601,
            );
    }

    private function getProcedureAction(NotificationInterface $notify): Action
    {
        return $this->procedures[$notify->getMethod()]
            ?? throw new \BadMethodCallException(
                \sprintf('RPC method "%s" not found', $notify->getMethod()),
                -32601,
            );
    }

    private function execute(Action $action, NotificationInterface $entry): mixed
    {
        $dto = $this->hydrator->hydrate($action->type, $entry->getParameters());

        $result = ($action->handler)($dto);

        if (\is_object($result)) {
            return $this->extractor->extract($result);
        }

        return $result;
    }

    /**
     * @psalm-suppress ArgumentTypeCoercion
     */
    private function error(IdentifiableInterface|IdInterface $id, \Throwable $e): FailureResponseInterface
    {
        \fwrite(\STDERR, (string)$e);

        return $this->responses->createFailure($id, (int)$e->getCode(), $e->getMessage(), [
            'type' => $e::class,
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);
    }

    /**
     * @psalm-suppress MixedAssignment
     */
    public function dispatchMethod(RequestInterface $request): ResponseInterface
    {
        try {
            $result = $this->execute($this->getMethodAction($request), $request);

            return $this->responses->createSuccess($request, $result);
        } catch (\Throwable $e) {
            return $this->error($request, $e);
        }
    }

    public function dispatchProcedure(NotificationInterface $notification): ?FailureResponseInterface
    {
        try {
            $this->execute($this->getProcedureAction($notification), $notification);

            return null;
        } catch (\Throwable $e) {
            return $this->error($this->ids->createEmpty(), $e);
        }
    }
}
