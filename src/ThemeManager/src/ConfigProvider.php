<?php

declare(strict_types=1);

namespace ThemeManager;

use Axleus\TranslatorConfigProviderTrait;
use Mezzio\LaminasView\LaminasViewRenderer;

/**
 * The configuration provider for the ThemeManager module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    use TranslatorConfigProviderTrait;

    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'translator'   => $this->getTranslatorConfig(),
            SettingsProvider::class => (new SettingsProvider)(),
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
