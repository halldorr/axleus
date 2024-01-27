<?php

declare(strict_types=1);

namespace PageManager\Storage;

use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Hydrator\ReflectionHydrator;
use Psr\Container\ContainerInterface;
use Axleus\Db\TableGateway;
use Axleus\Db\TableIdentifier;

final class PageRepositoryFactory
{
    public function __invoke(ContainerInterface $container): PageRepository
    {
        $db_settings = $container->get('config')['settings']['db'];
        /** @var Adapter */
        $adapter = $container->get(AdapterInterface::class);
        return new PageRepository(
            new TableGateway(
                new TableIdentifier(
                    'page',
                    $db_settings['table_prefix'],
                ),
                $adapter,
                null,
                new HydratingResultSet(
                    new ReflectionHydrator(),
                    new PageEntity()
                )
            ),
            new ReflectionHydrator(),
        );
    }
}
