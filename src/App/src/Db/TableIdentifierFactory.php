<?php

declare(strict_types=1);

namespace App\Db;

use Psr\Container\ContainerInterface;

final class TableIdentifierFactory
{
    public function __invoke(ContainerInterface $container): TableIdentifier
    {
        return new TableIdentifier(
            $container->get('config')['settings']['db']['table_prefix']
        );
    }
}
