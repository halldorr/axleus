<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;
use Psr\Container\ContainerInterface;

final class DoctrineFactory
{
    public function __invoke(ContainerInterface $container): QueryBuilder
    {
        $conn = DriverManager::getConnection($container->get('config')['doctrine']);
        return $conn->createQueryBuilder();
    }
}
