<?php

declare(strict_types=1);

namespace PageManager\Storage;

use Axleus\Db;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Hydrator\ReflectionHydrator;
use PageManager\SettingsProvider;
use Psr\Container\ContainerInterface;

final class PageRepositoryFactory
{
    public function __invoke(ContainerInterface $container): PageRepository
    {
        $config = $container->get('config');
        $hydrator = new ReflectionHydrator();
        /** @var Adapter */
        $adapter = $container->get(AdapterInterface::class);
        return new PageRepository(
            new Db\TableGateway(
                new Db\TableIdentifier(
                    $config[SettingsProvider::class]['table'],
                    $config[Db\SettingsProvider::class]['table_prefix'],
                ),
                $adapter,
                null,
                new HydratingResultSet(
                    $hydrator,
                    new PageEntity()
                )
            ),
            $hydrator
        );
    }
}
