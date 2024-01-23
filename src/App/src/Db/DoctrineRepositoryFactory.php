<?php

declare(strict_types=1);

namespace App\Db;

use Doctrine\DBAL\Query\QueryBuilder;
use Psr\Container\ContainerInterface;

final class DoctrineRepositoryFactory
{
    public function __invoke(ContainerInterface $container): DoctrineRepository
    {
        /** @var App\DB\TableIndentifier $table */
        $table = $container->get(TableIdentifier::class);
        $table->setTable('user');
        return new DoctrineRepository(
            new TableGateway(
                $table,
                $container->get(QueryBuilder::class)
            )
        );
    }
}
