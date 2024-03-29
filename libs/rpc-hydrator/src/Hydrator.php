<?php

declare(strict_types=1);

namespace Phplrt\RPC\Hydrator;

use Cache\Adapter\PHPArray\ArrayCachePool;
use CuyZ\Valinor\Mapper\TreeMapper;
use CuyZ\Valinor\MapperBuilder;
use Phplrt\Contracts\RPC\Hydrator\HydratorInterface;

final class Hydrator implements HydratorInterface
{
    private readonly TreeMapper $mapper;

    public function __construct()
    {
        $this->mapper = (new MapperBuilder())
            ->withCache(new ArrayCachePool())
            ->enableFlexibleCasting()
            ->allowPermissiveTypes()
            ->allowSuperfluousKeys()
            ->mapper()
        ;
    }

    public function hydrate(string $type, array $data): object
    {
        return $this->mapper->map($type, $data);
    }
}
