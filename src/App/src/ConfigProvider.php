<?php

declare(strict_types=1);

namespace App;

use Doctrine\DBAL\Query\QueryBuilder;

class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'aliases' => [
                'TableIdentifierInterface' => Db\TableIdentifier::class,
            ],
            'factories' => [
                Db\DoctrineRepository::class => Db\DoctrineRepositoryFactory::class,
                Db\TableIdentifier::class => Db\TableIdentifierFactory::class,
                QueryBuilder::class => Service\DoctrineFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            // 'paths' => [
            //     'app' => [__DIR__ . '/../templates/app/error'],
            //     'app' => [__DIR__ . '/../templates/app/layout']
            // ],
            'paths' => [
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }
}
