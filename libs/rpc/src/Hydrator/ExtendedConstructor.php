<?php

declare(strict_types=1);

namespace Phplrt\LanguageServer\RPC\Hydrator;

use Doctrine\Instantiator\Instantiator;
use Doctrine\Instantiator\InstantiatorInterface;
use JMS\Serializer\Construction\ObjectConstructorInterface;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Metadata\ClassMetadata;
use JMS\Serializer\Visitor\DeserializationVisitorInterface;

/**
 * @internal This is an internal class, please do not use it in your application code.
 * @psalm-internal Phplrt\LanguageServer\RPC\Hydrator
 */
final class ExtendedConstructor implements ObjectConstructorInterface
{
    private readonly InstantiatorInterface $instantiator;

    public function __construct()
    {
        $this->instantiator = new Instantiator();
    }

    public function construct(
        DeserializationVisitorInterface $visitor,
        ClassMetadata $metadata,
        mixed $data,
        array $type,
        DeserializationContext $context,
    ): ?object {
        $class = $metadata->name;

        if (\enum_exists($class)) {
            return $class::from($data);
        }

        return $this->instantiator->instantiate($metadata->name);
    }
}
