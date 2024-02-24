<?php

declare(strict_types=1);

namespace Test;

use Axleus\SettingsProviderTrait;
use League\Tactician;
use Mezzio\Application;
use Mezzio\Container\ApplicationConfigInjectionDelegator;

/**
 * The configuration provider for the Forum module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    public function __invoke() : array
    {
        return [
            'jeff_module_config' => 'jeffs_value',
            'dependencies' => $this->getDependencies(),
            'routes' => $this->getRoutesConfig(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories' => [],
        ];
    }

    public function getRoutesConfig(): array
    {
        return [
            [
                'name' => 'test',
                'path' => '/jeff/test',
                'middleware' => Handler\CreateTestHandler::class,
                'allowed_methods' => ['GET'],
            ],
        ];
    }
}
