<?php

declare(strict_types=1);

namespace UserManager;

use Laminas\Db\Adapter\AdapterInterface;
use Mezzio\Authentication\UserRepositoryInterface;
use Psr\Container\ContainerInterface;
use Axleus\Db;

final class UserRepositoryFactory
{

    public function __invoke(ContainerInterface $container): UserRepositoryInterface
    {
        $config = $container->get('config');
        /** @psalm-suppress MixedArgument, MixedArrayAccess */
        return new UserRepository(
            new Db\TableGateway(
                new Db\TableIdentifier(
                    'user',
                    $config[Db\SettingsProvider::class]['table_prefix'],
                ),
                $container->get(AdapterInterface::class)
            ),
            $container->get('config')['authentication']
        );
    }
}
