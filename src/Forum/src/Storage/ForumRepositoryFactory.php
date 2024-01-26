<?php

declare(strict_types=1);

namespace Forum\Storage;

use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\EventManager\EventManagerInterface;
use Laminas\Hydrator\ReflectionHydrator;
use Psr\Container\ContainerInterface;
use Axleus\Db\TableGateway;

final class ForumRepositoryFactory
{
    public function __invoke(ContainerInterface $container): ForumRepository
    {
        /** @var Adapter */
        $adapter = $container->get(AdapterInterface::class);
        return new ForumRepository(
            new TableGateway(
                Schema::FORUM_TABLE,
                $adapter,
                null,
                new HydratingResultSet(
                    new ReflectionHydrator(),
                    new ForumEntity()
                ),
                null,
                $container->has(EventManagerInterface::class) ? $container->get(EventManagerInterface::class) : null,
                $container->has(Listener\ForumRepositoryListener::class) ? $container->get(Listener\ForumRepositoryListener::class) : null
            ),
            new ReflectionHydrator()
        );
    }
}
