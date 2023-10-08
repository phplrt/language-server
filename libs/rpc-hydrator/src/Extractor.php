<?php

declare(strict_types=1);

namespace Phplrt\RPC\Hydrator;

final class Extractor implements ExtractorInterface
{
    public function __construct(
        private readonly bool $skipNulls = true,
    ) {
    }

    public function extract(object $object): array
    {
        return $this->object($object);
    }

    private function object(object $value): array
    {
        $result = [];

        foreach (\get_object_vars($value) as $name => $property) {
            // Skip nulls
            if ($property === null && $this->skipNulls) {
                continue;
            }

            $result[$name] = $this->value($property);
        }

        return $result;
    }

    /**
     * @template TValue of mixed
     *
     * @param iterable<array-key, TValue> $value
     *
     * @return array<array-key, TValue>
     */
    private function iterable(iterable $value): array
    {
        $result = [];

        foreach ($value as $key => $item) {
            $result[$key] = $this->value($item);
        }

        return $result;
    }

    private function value(mixed $value): mixed
    {
        if (\is_iterable($value)) {
            return $this->iterable($value);
        }

        if (\is_object($value)) {
            if ($value instanceof \BackedEnum) {
                return $value->value;
            }

            return $this->object($value);
        }

        return $value;
    }
}
