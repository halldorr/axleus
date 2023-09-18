<?php

declare(strict_types=1);

namespace Forum;

use Mezzio\Application;
use Mezzio\Container\ApplicationConfigInjectionDelegator;

/**
 * The configuration provider for the Forum module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    private const SETTINGS_PATH = __DIR__ . '/../../../data/settings/forum.php';
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
            'routes'       => $this->getRoutes(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
            ],
        ];
    }

    public function getRoutes(): array
    {
        /** @var array<array-key, mixed> $settings*/
        $settings = require self::SETTINGS_PATH;
        /** @var bool|null */
        /** @psalm-suppress InvalidArrayOffset */
        $flag = $settings[static::class]['serve-forum-from-root'] ?? null;

        $routes = [
            [
                'path'            => '/',
                'name'            => 'home',
                'middleware'      => Handler\ForumHandler::class,
                'allowed_methods' => ['GET'],
            ],
            [
                'path'            => '/' . $settings[static::class]['base-uri-segment'] . '[/{title:[a-zA-Z-]+}]',
                'name'            => 'forum',
                'middleware'      => Handler\ForumHandler::class,
                'allowed_methods' => ['GET'],
            ],
        ];
        return $flag ? $routes : [];;
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'forum'    => [__DIR__ . '/../templates/forum'],
            ],
        ];
    }
}
