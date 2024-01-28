<?php

declare(strict_types=1);

namespace PageManager;

use Axleus\TranslatorConfigProviderTrait;

/**
 * The configuration provider for the PageManager module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    use TranslatorConfigProviderTrait;

    private array $settings;
    private bool $routeFlag;

    protected ?string $file = 'page-manager';

    public function __construct()
    {
        /**
         * @psalm-suppress UnresolvableInclude
         * @psalm-suppress MixedAssignment
         * */
        $this->settings = (new SettingsProvider)();

        /**
         * @psalm-suppress MixedAssignment
         * @psalm-suppress MixedArrayAccess
         * */
        $this->routeFlag = $this->settings['serve-forum-from-root'] ?? false;
    }

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
            'routes'       => $this->getRoutes(),
            'tactician'    => $this->getTacticianConfig(),
            'translator'   => $this->getTranslatorConfig(),
            SettingsProvider::class => $this->settings,
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies(): array
    {
        return [
            'aliases' => [],
            'factories' => [
                Handler\PageHandler::class            => Handler\PageHandlerFactory::class,
                Storage\PageRepository::class         => Storage\PageRepositoryFactory::class,
                Storage\SavePageCommandHandler::class => Storage\SavePageCommandHandlerFactory::class,
            ],
        ];
    }

    public function getTacticianConfig(): array
    {
        return [
            'handler-map' => [
                Storage\SavePageCommand::class => Storage\SavePageCommandHandler::class,
            ],
        ];
    }

    public function getRoutes(): array
    {
        $routes = [
            [
                'path'            => '/',
                'name'            => 'home',
                'middleware'      => Handler\PageHandler::class,
                'allowed_methods' => ['GET'],
            ],
            [
                'path'            => '/{title:[a-zA-Z-]+}', // + char must be present
                'name'            => 'page',
                'middleware'      => Handler\PageHandler::class,
                'allowed_methods' => ['GET'],
            ],
        ];
        return ! $this->routeFlag ? $routes : [];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'page-manager' => [__DIR__ . '/../templates/'],
            ],
        ];
    }
}
