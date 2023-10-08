<?php

declare(strict_types=1);

namespace Phplrt\RPC\Dispatcher;

use Phplrt\RPC\Hydrator\ExtractorInterface;
use Phplrt\RPC\Hydrator\HydratorInterface;
use Phplrt\Contracts\RPC\Message\FailureResponseInterface;
use Phplrt\Contracts\RPC\Message\IdentifiableInterface;
use Phplrt\Contracts\RPC\Message\Factory\IdFactoryInterface;
use Phplrt\Contracts\RPC\Message\IdInterface;
use Phplrt\Contracts\RPC\Message\NotificationInterface;
use Phplrt\Contracts\RPC\Message\RequestInterface;
use Phplrt\Contracts\RPC\Message\Factory\ResponseFactoryInterface;
use Phplrt\Contracts\RPC\Message\ResponseInterface;

final class Dispatcher implements DispatcherInterface
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
     * @param iterable<non-empty-string, Action> $methods
     */
    public function __construct(
        iterable $methods,
        private readonly HydratorInterface $hydrator,
        private readonly ExtractorInterface $extractor,
        private readonly ResponseFactoryInterface $responses,
        private readonly IdFactoryInterface $ids,
    ) {
        $this->addMethods($methods);
    }

    private function isProcedureByType(?\ReflectionNamedType $type): bool
    {
        return $type instanceof \ReflectionNamedType
            && $type->isBuiltin()
            && \in_array($type->getName(), self::PROCEDURE_RETURN_TYPES, true)
        ;
    }

    private function isProcedureByReflection(\ReflectionFunction $function): bool
    {
        return $this->isProcedureByType($function->getReturnType());
    }

    private function isProcedure(callable $handler): bool
    {
        return $this->isProcedureByReflection(new \ReflectionFunction($handler));
    }

    public function addMethod(string $name, Action $action): void
    {
        if ($this->isProcedure($action->handler)) {
            $this->procedures[$name] = $action;
        } else {
            $this->methods[$name] = $action;
        }
    }

    /**
     * @param iterable<non-empty-string, Action> $methods
     */
    public function addMethods(iterable $methods): void
    {
        foreach ($methods as $method => $action) {
            $this->addMethod($method, $action);
        }
    }

    public function dispatch(NotificationInterface $request): ?ResponseInterface
    {
        try {
            if ($request instanceof RequestInterface) {
                $result = $this->execute($this->getMethodAction($request), $request);

                return $this->responses->createSuccess($request, $result);
            }

            $this->execute($this->getProcedureAction($request), $request);

            return null;
        } catch (\Throwable $e) {
            return $this->createError($e, $this->getResponseIdentifier($request));
        }
    }

    private function getResponseIdentifier(NotificationInterface $request): IdInterface
    {
        if ($request instanceof IdentifiableInterface) {
            return $request->getId();
        }

        return $this->ids->createEmpty();
    }

    private function getProcedureAction(NotificationInterface $notify): Action
    {
        return $this->procedures[$notify->getMethod()]
            ?? throw new \BadMethodCallException(
                \sprintf('RPC procedure "%s" not found', $notify->getMethod()),
                -32601,
            );
    }

    private function getMethodAction(RequestInterface $request): Action
    {
        return $this->methods[$request->getMethod()]
            ?? throw new \BadMethodCallException(
                \sprintf('RPC method "%s" not found', $request->getMethod()),
                -32601,
            );
    }

    private function execute(Action $action, NotificationInterface $request): mixed
    {
        $dto = $this->hydrator->hydrate($action->type, $request->getParameters());

        $result = ($action->handler)($dto);

        if (\is_object($result)) {
            return $this->extractor->extract($result);
        }

        return $result;
    }

    /**
     * @psalm-suppress ArgumentTypeCoercion
     */
    private function createError(\Throwable $e, IdentifiableInterface|IdInterface $id): FailureResponseInterface
    {
        \fwrite(\STDERR, (string)$e);

        return $this->responses->createFailure($id, (int)$e->getCode(), $e->getMessage(), [
            'type' => $e::class,
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);
    }

    public function has(NotificationInterface $request): bool
    {
        if ($request instanceof RequestInterface) {
            return isset($this->methods[$request->getMethod()]);
        }

        return isset($this->procedures[$request->getMethod()]);
    }
}
