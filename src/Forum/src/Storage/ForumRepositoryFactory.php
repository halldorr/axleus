<?php

declare(strict_types=1);

namespace Forum\Storage;

use Axleus\Db;
use Forum\SettingsProvider;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\EventManager\EventManagerInterface;
use Laminas\Hydrator\ReflectionHydrator;
use Psr\Container\ContainerInterface;

final class ForumRepositoryFactory
{
    public function __invoke(ContainerInterface $container): ForumRepository
    {
        $config = $container->get('config');
        /** @var Adapter */
        $adapter = $container->get(AdapterInterface::class);
        return new ForumRepository(
            new Db\TableGateway(
                new Db\TableIdentifier(
                    $config[SettingsProvider::class]['forum_table'],
                    $config[Db\SettingsProvider::class]['table_prefix']
                ),
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
