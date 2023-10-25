<?php

declare(strict_types=1);

namespace ThemeManager;

use Mezzio\LaminasView\LaminasViewRenderer;

/**
 * The configuration provider for the ThemeManager module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    public function __invoke(): array
    {
        $settingsProvider = new SettingsProvider();
        return [
            'dependencies' => $this->getDependencies(),
            \Axleus\SettingsProvider::class => $settingsProvider(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories' => [
                LaminasViewRenderer::class => RendererFactory::class,
            ],
        ];
    }

    public function getPipeConfig(): array
    {
        return [
            // Middleware\AjaxRequestMiddleware::class => [

            // ],
        ];
    }

    public function getTemplates(): array
    {
        return [
            'paths' => [
                'theme-manager' => [__DIR__ . '/../templates/'],
            ],
        ];
    }
}
