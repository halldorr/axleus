<?php

declare(strict_types=1);

namespace UserManager;

use Laminas\Db\Adapter\AdapterInterface;
use Mezzio\Authentication\UserRepositoryInterface;
use Psr\Container\ContainerInterface;
use Axleus\Db\TableGateway;
use Axleus\Db\TableIdentifier;

final class UserRepositoryFactory
{

    public function __invoke(ContainerInterface $container): UserRepositoryInterface
    {
        $db_settings = $container->get('config')['settings']['db'];
        /** @psalm-suppress MixedArgument, MixedArrayAccess */
        return new UserRepository(
            new TableGateway(
                new TableIdentifier(
                    'user',
                    $db_settings['table_prefix'],
                ),
                $container->get(AdapterInterface::class)
            ),
            $container->get('config')['authentication']
        );
    }
}
