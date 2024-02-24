<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ArrayProvider;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;
use Mezzio\Helper\ConfigProvider;

// To enable or disable caching, set the `ConfigAggregator::ENABLE_CACHE` boolean in
// `config/autoload/local.php`.
$cacheConfig = [
    'config_cache_path' => 'data/cache/config-cache.php',
];

$aggregator = new ConfigAggregator([
    \Laminas\Navigation\ConfigProvider::class,
    \Axleus\Log\ConfigProvider::class,
    \Webinertia\Validator\ConfigProvider::class,
    \Webinertia\Filter\ConfigProvider::class,
    \Laminas\I18n\ConfigProvider::class,
    \BsbFlysystem\ConfigProvider::class,
    \TacticianModule\ConfigProvider::class,
    \Laminas\Form\ConfigProvider::class,
    \Laminas\InputFilter\ConfigProvider::class,
    \Laminas\Filter\ConfigProvider::class,
    \Laminas\Validator\ConfigProvider::class,
    \Mezzio\Flash\ConfigProvider::class,
    \Mezzio\Session\Ext\ConfigProvider::class,
    \Mezzio\Authentication\Session\ConfigProvider::class,
    \Mezzio\Session\ConfigProvider::class,
    \Mezzio\Authentication\ConfigProvider::class,
    \Webinertia\Utils\ConfigProvider::class,
    \Laminas\Hydrator\ConfigProvider::class,
    \Laminas\Db\ConfigProvider::class,
    \Axleus\Db\ConfigProvider::class,
    \Mezzio\LaminasView\ConfigProvider::class,
    \Mezzio\Tooling\ConfigProvider::class,
    \Mezzio\Helper\ConfigProvider::class,
    \Mezzio\Router\FastRouteRouter\ConfigProvider::class,
    \Laminas\HttpHandlerRunner\ConfigProvider::class,
    \Limatus\ConfigProvider::class,
    // Include cache configuration
    new ArrayProvider($cacheConfig),
    ConfigProvider::class,
    \Mezzio\ConfigProvider::class,
    \Mezzio\Router\ConfigProvider::class,
    \Laminas\Diactoros\ConfigProvider::class,
    // Swoole config to overwrite some services (if installed)
    class_exists(\Mezzio\Swoole\ConfigProvider::class)
        ? \Mezzio\Swoole\ConfigProvider::class
        : function (): array {
            return [];
        },
    /**
     * Core package, we do not use the component installer for this
     * package as it must be loaded in this order
     */
    class_exists(\Axleus\ConfigProvider::class)
    ? \Axleus\ConfigProvider::class
    : function (): array {
        return [];
    },
    /**
     * App module
     * Other modules can have dependencies to App
     * App SHALL NOT have dependencies on other modules
     * outside of /vendor
     */
    \App\ConfigProvider::class,
    // application level packages,
    \Test\ConfigProvider::class,
    \Forum\ConfigProvider::class,
    \PageManager\ConfigProvider::class,
    \ThemeManager\ConfigProvider::class,
    \UserManager\ConfigProvider::class,
    /**
     * Loads last to allow plugins to override configuration as needed.
     */
    \Axleus\PluginManager\ConfigProvider::class,
    /**
     * If DevTools is present load the provider
     */
    class_exists(\Axleus\DevTools\ConfigProvider::class)
        ? \Axleus\DevTools\ConfigProvider::class
        : function(): array {
            return [];
        },
    // Load application config in a pre-defined order in such a way that local settings
    // overwrite global settings. (Loaded as first to last):
    //   - `global.php`
    //   - `*.global.php`
    //   - `local.php`
    //   - `*.local.php`
    /**
     * include the settings files from /data/app. They are stored there because they will be modified
     * loading in this order allows for any development mode settings to override them
     * without having to change the base values
     */
    new PhpFileProvider(realpath(__DIR__ . '/../') . '/data/settings/{,*}.php'),
    new PhpFileProvider(realpath(__DIR__ . '/../') . '/plugin/src/*/config/{,*}.php'),
    new PhpFileProvider(realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php'),
    // Load development config if it exists
    new PhpFileProvider(realpath(__DIR__) . '/development.config.php'),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
