<?php

declare(strict_types=1);

namespace App;

use Axleus\Authorization\AuthorizedServiceDelegator;
use Laminas\I18n\Translator\Loader\PhpArray;

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
            'dependencies'        => $this->getDependencies(),
            //'middleware_pipeline' => $this->getPipelineConfig(),
            'routes'              => $this->getRouteConfig(),
            'templates'           => $this->getTemplates(),
            'translator'          => $this->getTranslatorConfig(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories' => [
                AdminHandler\DashBoardHandler::class       => AdminHandler\DashBoardHandlerFactory::class,
                AdminHandler\DashBoardHandler::class       => AdminHandler\DashBoardHandlerFactory::class,
                AdminMiddleware\DashBoardMiddleware::class => AdminMiddleware\DashBoardMiddlewareFactory::class,
            ],
            'delegators' => [
                AdminHandler\DashBoardHandler::class => [
                    AuthorizedServiceDelegator::class
                ],
            ],
        ];
    }

    public function getPipelineConfig(): array
    {
        return [
        ];
    }

    public function getRouteConfig(): array
    {
        return [
            [
                'path' => '/admin/dashboard',
                'name' => 'admin.dashboard',
                'middleware' => [
                    AdminMiddleware\DashBoardMiddleware::class,
                    AdminHandler\DashBoardHandler::class
                ],
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'app'    => [__DIR__ . '/../templates/app'],
                'error'  => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
        ];
    }

    public function getTranslatorConfig(): array
    {
        return [
            'translation_file_patterns' => [ // This is the only config that is needed for 1 translation per file
                [
                    'type'     => PhpArray::class,
                    'filename' => 'en_US.php',
                    'base_dir' => __DIR__ . '/../language',
                    'pattern'  => '%s.php',
                ],
            ],
            'translation_files' => [
                [
                    'type'        => 'PhpArray',
                    'filename'    => __DIR__ . '/../language/en_US.php',
                    'locale'      => 'en_US',
                    'text_domain' => 'default',
                ],
            ],
        ];
    }
}
