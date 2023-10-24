<?php

declare(strict_types=1);

namespace Forum;

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
    private const SETTINGS_PATH = __DIR__ . '/../../../data/settings/forum.php';
    /** @var array<array-key, mixed> $settings */
    private array $settings;
    private bool $routeFlag;
    private string $uriSegment;
    private string $route;

    public function __construct()
    {
        /**
         * @psalm-suppress UnresolvableInclude
         * @psalm-suppress MixedAssignment
         * */
        $this->settings = (require self::SETTINGS_PATH)[\Axleus\SettingsProvider::class][\Forum\SettingsProvider::class];

        /**
         * @psalm-suppress MixedAssignment
         * @psalm-suppress MixedArrayAccess
         * */
        $this->routeFlag = $this->settings['serve-forum-from-root'] ?? false;

        /**
         * @psalm-suppress MixedAssignment
         * @psalm-suppress MixedArrayAccess
         * */
        $this->uriSegment = $this->settings['base-uri-segment'];

        /** @psalm-suppress MixedOperand */
        $this->route = $this->routeFlag ? '/' : '/' . $this->uriSegment;
    }
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke() : array
    {
        return [
            'dependencies'        => $this->getDependencies(),
            'templates'           => $this->getTemplates(),
            'routes'              => $this->getRoutes(),
            'middleware_pipeline' => $this->getPipelineConfig(),
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
                Handler\ForumHandler::class       => Handler\ForumHandlerFactory::class,
                Middleware\ForumMiddleware::class => Middleware\ForumMiddlewareFactory::class,
            ],
        ];
    }

    public function getPipelineConfig(): array
    {
        return [
            [
                'path'       => $this->route,
                'middleware' => Middleware\ForumMiddleware::class,
                'priority'   => 2000
            ],
        ];
    }

    /**
     * @psalm-suppress InvalidArrayOffset
     * @psalm-suppress MixedAssignment
     * */
    public function getRoutes(): array
    {

        $routes = [
            [
                'path'            => $this->route . '/{forumName}',
                'name'            => 'forum',
                'middleware'      => Handler\ForumHandler::class,
                'allowed_methods' => ['GET'],
            ],
        ];
        if ($this->routeFlag) {
            $routes[] = [
                'path'            => '/',
                'name'            => 'home',
                'middleware'      => Handler\ForumHandler::class,
                'allowed_methods' => ['GET'],
            ];
        }
        return $routes;
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
