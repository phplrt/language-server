<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Hydrator;

use Cache\Adapter\PHPArray\ArrayCachePool;
use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Metadata\Cache\PsrCacheAdapter;

final class Hydrator implements HydratorInterface, ExtractorInterface
{
    private readonly ArrayTransformerInterface $serializer;

    /**
     * @param array<non-empty-string, non-empty-string> $metadata
     */
    public function __construct(array $metadata = [])
    {
        $builder = SerializerBuilder::create();
        $builder->enableEnumSupport();

        $this->serializer = $builder
            ->setMetadataDirs($metadata)
            ->setMetadataCache(new PsrCacheAdapter('rpc', new ArrayCachePool()))
            ->setPropertyNamingStrategy(new IdenticalPropertyNamingStrategy())
            ->setDebug((bool)\assert_options(\ASSERT_ACTIVE))
            ->setObjectConstructor(new ExtendedConstructor())
            ->build()
        ;
    }

    public function extract(object $object): array
    {
        $context = SerializationContext::create()
            ->setSerializeNull(false)
        ;

        return $this->serializer->toArray($object, $context);
    }

    public function hydrate(string $type, array $data): object
    {
        $context = DeserializationContext::create();

        return $this->serializer->fromArray($data, $type, $context);
    }
}
